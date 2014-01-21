<?php

class Controller_Login extends Controller_Public
{
        public function action_index()
        {
            $data["subnav"] = array('login'=> 'active' );
            if (Input::post()) {
                $auth = Auth::instance();

                if ($auth->login()) { // ja != verified, kļūda
                    if ($auth->get_profile_fields("verified", false) == false) {
                        Session::set_flash("error", "Tu neesi apstiprinājis savu e-pastu!");
                    }else{
                        //Session::set_flash("success", "Jūs esat pieslēdzies sistēmai.");
                        Response::redirect('/') and die();
                    }
                } else {
                    Session::set_flash("error", "Nepareizs lietotājvārds un/vai parole.");
                }
            }
            $this->template->title = 'Autorizācija';
            $this->template->content = View::forge('login/index', $data);
            
        }
        
        public function action_setlang($lang=null){
	//assumes there is an authenticated user
            if ($lang!=null){
                $auth = Auth::instance();
                $auth->update_user(array("language"=>$lang));
                Response::redirect("/");
            }
        }
	public function action_login()
	{
		$data["subnav"] = array('login'=> 'active' );
		$this->template->title = 'Login &raquo; Login';
		$this->template->content = View::forge('login/index', $data);
	}

	public function action_logout()  // izlogojas un pārmet uz galveno lapu
	{
            $auth = Auth::instance();
            $auth->logout();
            Response::redirect("/");
	}

	public function action_register()
	{
            if (Input::method() == "POST") {
                $exist_user = DB::select("id")
                        ->from("users")
                        ->where("email", "=", Input::post("usermail"))
                        ->execute()
                        ->as_array();
                $is_err = false;
                if (count($exist_user) > 0) {
                    //sorry, the username is taken already :(
                    Session::set_flash("error", "The username is already taken");
                    $is_err = true;
                }

                if (Input::post("password") != Input::post("password_rep")) {
                    Session::set_flash("error", "Passwords do not match!");
                    $is_err = true;
                }

                if ($is_err == false) {
                    //no errors - we can register!
                    $verification_key = md5(mt_rand(0, mt_getrandmax()));
                    $newid = Auth::instance()->create_user(
                            Input::post("usermail"), //username = email
                            Input::post("password"),
                            Input::post("usermail"),
                            1, //simple user
                            array("verified" => false,
                                  "verification_key" => $verification_key)
                            );
                    Session::set_flash("success", "Registration successful!\nYou still have to verify your e-mail address.");
                    $this->action_send_verification_email($newid, Input::post("usermail"), $verification_key);
                    //nothing else to do here
                    Response::redirect("/");
                }
            }
            $this->template->title = 'Login &raquo; Register';
            $this->template->page_title = "Become a member";
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
