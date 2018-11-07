<?php

class forgotpassword extends controller {
		
	public function __construct() {
		parent::__construct();
		
		$errorHandler = new ErrorHandler();
		
		// check for form submission - if it doesn't exist then send back to contact form
		if (isset($_POST['forgotpassword']) && $_POST['forgotpassword'] == 'admin') {
			
			// get the posted data
			$this->email = $_POST['sb-email'];
			
			$validator = new Validator($errorHandler);
				
			$validation = $validator->check($_POST, array (
				'sb-email' => array(
								'required' => true,
								'minlength' => 7,
								'email' => true
							)
			));
			
			if($validation->fails())
			{
				if($validation->errors()->first('sb-email')) {
					$this->error = $validation->errors()->first('sb-email');
				}
				
			} else {
				
				if($this->email == "sandun@employee-comms.co.uk") {
					
					$this->email = '';
					
					$this->note = 'A link to reset your password has been sent. <a href="login" class="alert-link">Please login</a>.';
				
				} else {
					$this->error = "Can't find that email, sorry.";
				}								
				
			}
			
		}
				
		$this->renderPage('admin/sb-forgot-password');
	}
}

?>