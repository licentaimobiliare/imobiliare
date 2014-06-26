<?php

/**
 * Controller for homepage and general pages.
 */
class controller_test {

	/**
	 * This is the homepage.
	 */
	function action_index($params) {
//            $exemplu=array('pret'=>'100000','cartier'=>'gheorgheni','data_inregistrare'=>'','mp'=>'100','descriere'=>'asdfgh','idf'=>'superextrafinisat','idt_constructie'=>'extranoua','idtl'=>'megacasa','idti'=>'periferic','data_constructie'=>'07/05/1990','idp'=>'Florin',);
//            $exemplu=array('name'=>'bianca','address'=>'florilor','lat'=>'1256','lng'=>'134','type'=>'asd','id'=>12);
//            $exemplu=array('nume'=>'maria','strada'=>'123','nr'=>'12sfg','bl'=>'125496','ap'=>'2','sc'=>'a','et'=>'2','oras'=>'turda','judet'=>'cluj','cnp'=>15 );
       $exemplu=array('idtl'=>'6','tip_locuinta'=>'bla bla 5');
            echo "<pre>";
//            print_r(model_DateImobil :: deleteproprietari(123));die;
//                        print_r(model_DateImobil :: StraziGetById(array(1,2)));die;
//            print_r(model_DateImobil :: StraziListName('a'));die;
         print_r(model_DateImobil :: updatetl($exemplu));die;

//            print_r(model_DateImobil :: proprietariListName('2'));die;
              print_r(model_DateImobil :: markersGetByIdImobil(31));die;
              print_r(model_DateImobil:: updateRelCodStradaNumarImobil($exemplu));die;
		$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
		echo json_encode($arr);
		//@include_once APP_PATH . 'view/home_index.tpl.php';	
	
                
        }


	function action_exemplu ($params){
		@include_once APP_PATH . 'view/asdf.tpl.php';
        }

        

}
