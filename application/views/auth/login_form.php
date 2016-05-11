<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="http://localhost/assets/css/bootstrap-theme.min.css">
	<!-- <link rel="stylesheet" href="http://localhost/powerclean/assets/css/cover.css"> -->

	
</head>
<body>
<?php
				$login = array(
					'name'	=> 'login',
					'id'	=> 'login',
					'value' => set_value('login'),
					'maxlength'	=> 80,
					'size'	=> 30,
				);
				if ($login_by_username AND $login_by_email) {
					$login_label = 'Email or login';
				} else if ($login_by_username) {
					$login_label = 'Login';
				} else {
					$login_label = 'Email';
				}
				$password = array(
					'name'	=> 'password',
					'id'	=> 'password',
					'size'	=> 30,
				);
				$remember = array(
					'name'	=> 'remember',
					'id'	=> 'remember',
					'value'	=> 1,
					'checked'	=> set_value('remember'),
					'style' => 'margin:0;padding:0',
				);
				$captcha = array(
					'name'	=> 'captcha',
					'id'	=> 'captcha',
					'maxlength'	=> 8,
				);
				?>

<style type="text/css">
  input {
  background: #fff;
  border: 1px solid #c6c7cc;
   box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1);
  color: #636466;
  padding: 6px;
  margin-top: 6px;
  width: 100%;
}

.aaa label {
  color: #7c7c80;
  font-size: 14px;
  float: left;
  margin: 10px 0 5px 0px;
}

.lbl{
  color: #7c7c80;
  font-size: 12px;
  float: left;
  margin: 10px 0 0 20px;
}

.aaa {
  border: 1px solid #c6c7cc;
  border-radius: 5px;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
  overflow: hidden;
  width: 240px;
  padding: 10px;
}
fieldset {
  border: 0;
  margin: 0;
  padding: 0;
}
input {
  border-radius: 5px;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
  margin: 0;
}

input[type="submit"] {
  background: linear-gradient(#49708f, #293f50);
  border: 0;
  color: #fff;
  cursor: pointer;
  font-weight: bold;
  float: left;
  padding: 8px 16px;
}

</style>     
      

      <!-- Modal -->
            &nbsp;
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-4 text-center">
                <button class="btn btn-primary" type="button">
                  Login into the system
                </button>
              </div>
              <div class="col-lg-4"></div>
            </div>
            &nbsp;
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-4 table-bordered" align="center">
              
            <?php echo form_open($this->uri->uri_string()); ?>
            <table class="aaa" border="0">
                <tr>
                  <td><?php echo form_label($login_label, $login['id']); ?></td>
                </tr>
                <tr>
                  <td><?php echo form_input($login); ?></td>
                </tr>
                <tr>
                  <td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
                </tr>
              <tr>
                <td><?php echo form_label('Password', $password['id']); ?></td>
              </tr>
              <tr>
                <td><?php echo form_password($password); ?></td>
              </tr>
              <tr>
                <td style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></td>
              </tr>

              <?php if ($show_captcha) {
                if ($use_recaptcha) { ?>
              <tr>
                <td colspan="2">
                  <div id="recaptcha_image"></div>
                </td>
                <td>
                  <a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
                  <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
                  <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="recaptcha_only_if_image">Enter the words above</div>
                  <div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
                </td>
                <td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
                <td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
                <?php echo $recaptcha_html; ?>
              </tr>
              <?php } else { ?>
              <tr>
                <td colspan="3">
                  <p>Enter the code exactly as it appears:</p>
                  <?php echo $captcha_html; ?>
                </td>
              </tr>
              <tr>
                <td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
                <td><?php echo form_input($captcha); ?></td>
                <td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
              </tr>
              <?php }
              } ?>

              <tr>
                <td colspan="3">

                 

                  <label class="lbl">
                    Stay signed in
                  </label>
                  <?php echo form_checkbox($remember); ?>  
                  
                  <?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?> | 
                  <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
                </td>
              </tr>

              <tr>
                <td colspan="3">
                &nbsp;
                  <?php echo form_submit('submit', 'Let me in'); ?>
                </td>
              </tr>
            </table>
            <?php echo form_close(); ?>
            &nbsp;
            </div>
            <div class="col-lg-4"></div>
        
           
         

	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>