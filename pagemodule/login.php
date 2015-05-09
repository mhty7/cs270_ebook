<?php


require_once ('HTML/QuickForm2.php');
require_once ('HTML/QuickForm2/Renderer.php');


class login extends view {

	var $smarty;
	function __construct(){

		$this->smarty = parent::__construct();

	}

	function main(){

		$form = new HTML_Quickform2('qform_smarty', 'POST', 
			array ('action' => 'index.php'));
		
		$uname = $form->addElement('text', 'uname',
			array('style' => 'width: 100px;'),
			array('label' => "UserID:"));
		$upass = $form->addElement('password', 'upass',
			array('style' => 'width: 100px;'),
			array('label' => "Password:"));
		$button = $form->addElement('submit', 'send',
			array('value' => "Login"));


		$uname->addRule('required', USERIDEMPTY);
		$upass->addRule('required', PASSEMPTY);
		$uname->addRule('regex', USERIDERR, '/^[ -~]+$/');


		$uname->addFilter('htmlspecialchars');

		$form->addRecursiveFilter('trim');
		

		if ($form->validate()) {

			if((isset( $_POST[P_USERID] )) &&  (isset( $_POST[P_USERPASS] ))){

				require_once(LIBPATH.'user.php');

				$usr_ins = new UserOperation;

				$res = $usr_ins->userlogin($_POST[P_USERID], $_POST[P_USERPASS]);

				if ($res[RESFLAG] == TRUE){

					$usr_ins->dbend();

					if (empty( $_SESSION[USER_ID])) {
						$_SESSION[USER_ID] = $res[RESDATA]['username'];
					}

					if ( !empty( $_SESSION[USER_ID]) ){
						$this->_redirect(DEFAULT_MODULE);
					}

				} else {
					echo "<span style=\"color:#FF0000\">".LOGINERR."</span>";
					$usr_ins->dbend();
				}
				$this->createForm($form);
			}
		} else {
			$this->createForm($form);
		}

	}

	function createForm($form){
			
		HTML_QuickForm2_Renderer::register('smarty', 'HTML_QuickForm2_Renderer_Smarty');
        $renderer = HTML_QuickForm2_Renderer::factory('smarty');
        $renderer->setOption('old_compat', true);
        $renderer->setOption('group_errors', true);
        

        $FormData = $form->render($renderer)->toArray();
        $this->smarty->assign('form', $FormData);
        $this->smarty->display('login.html'); 

	}

}

?>
