<?php

class Controller_Login extends Controller_Template
{
        public function action_index()
        {
            if (Input::post()) {
                $auth = Auth::instance();

                if ($auth->login()) { // ja != verified, kļūda
                    if ($auth->get_profile_fields("verified", false) == false) {
                        Session::set_flash("error", "Tu neesi apstiprinājis savu e-pastu!");
                    }else{
                        Response::redirect('/') and die();
                    }
                } else {
                    Session::set_flash("error", "Nepareizs lietotājvārds un/vai parole.");
                }
            }

            $this->template->title = 'Autorizācija';
            $this->template->content = View::forge('login/index', $data);
            
        }
	public function action_login()
	{
		$data["subnav"] = array('login'=> 'active' );
		$this->template->title = 'Login &raquo; Login';
		$this->template->content = View::forge('login/login', $data);
	}

	public function action_logut()  // izlogojas un pārmet uz galveno lapu
	{
            $auth = Auth::instance();
            $auth->logout();
            Response::redirect("/");
	}

	public function action_register()
	{
            $bool = false;
            if (Input::method() == "POST") {
                
                $exist_user = DB::select("id")
                        ->from("users")
                        ->where("email", "=", Input::post("email"))
                        ->execute()
                        ->as_array();
	    
                if (count($exist_user) >= 1) { // ja tiek atlasīts vismaz 1 lietotājs izvada kļūdas paziņojumu

                    Session::set_flash("error", "Šāds lietotājvārds jau eksistē!");
                    $bool = true;
                }

                if (Input::post("password") != Input::post("password_rep")) {
                    Session::set_flash("error", "Paroles nesakrīt savā starpā!");
                    $bool = true;
                }

                if ($bool == false) { // ja nav kļūdu, tad reģistrē un piešķir lomu user

                    $verification_key = md5(mt_rand(0, mt_getrandmax()));
                    $newid = Auth::instance()->create_user(
                            Input::post("email"), //username = email
                            Input::post("password"),
                            Input::post("email"),
                            1, 
                            array("verified" => false,
                                  "verification_key" => $verification_key)
                            );
                    Session::set_flash("success", "Reģistrācija notika veiksmīgi!\nApstiprini e-pastu!");
                    $this->action_send_verification_email($newid, Input::post("email"), $verification_key);
                    Response::redirect("/");
                }
            }
            $this->template->title = 'Reģistrācija';
            $this->template->page_title = "Reģistrācija";
            $this->template->content = View::forge("login/register");
	}

	public function action_lostpassword()
	{
		$data["subnav"] = array('lostpassword'=> 'active' );
		$this->template->title = 'Login &raquo; Lostpassword';
		$this->template->content = View::forge('login/lostpassword', $data);
	}
        
        public function action_send_verification_email($id, $mailaddress, $key) {

            $email = Email::forge();
            $email->from('admin@frezo.lv', 'Frezo.lv');

            $email->to($mailaddress, "Frezo.lv sistēmas lietotājs");
            $email->subject('Jūsu reģistrācija @ Frezo.lv');

            $mail_text = "'Paldies par reģistrāciju frezo.lv'
                         Lūdzu pabeidziet reģistrāciju, noklikšķinot uz saites: " .
                    Uri::create("login/verify/" . $id . "/" . $key . "/");
            $email->body($mail_text);
            $email->send();
        }

        public function action_verify($userid, $key) {
            $auth = Auth::instance();

            if ($auth->force_login($userid)) {
                if ($auth->get_profile_fields("verification_key", null) != $key) {
                    $auth->logout();
                    Session::set_flash("error", "Nepareiza verifikācijas atslēgta!");
                }else{
                    $auth->update_user(array("verified"=>true, "verification_key"=>null));
                    Session::set_flash("success", "Jūsu reģistrācija ir pabeigta!!");
                }
            }else{
                Session::set_flash("error", "Nevar pieslēgties sistēmai!");
            }
            Response::redirect("/");
        }

}
