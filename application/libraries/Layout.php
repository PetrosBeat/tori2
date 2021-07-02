<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
      private $obj;
      private $layout_view;
      private $title        = '';
      private $titleDefault = 'Intranet';
      private $css_list     = array(), $js_list = array();
      private $metas        = '';
      private $navegacion   = array();
      public $current       = '';

    function __construct()
    {

                            $this->obj =& get_instance();
                              $this->layout_view = "layout/main.php";
        #CSS
                 $this->css('assets/css/bootstrap.css');
                 $this->css('assets/css/plugins/fullcalendar/fullcalendar.css');
                 $this->css('assets/datetimepicker/jquery.datetimepicker.css');

                 $this->css('assets/css/animate.css');
                 $this->css('assets/font-awesome/css/font-awesome.css');
                 $this->css('assets/css/plugins/toastr/toastr.min.css');
                 $this->css('assets/css/plugins/sweetalert/sweetalert.css');
                 $this->css('assets/css/plugins/datapicker/datepicker3.css');
                 $this->css('assets/css/plugins/dataTables/datatables.min.css');
                  $this->css('assets/charts/dist/Chart.css');
                 $this->css('assets/css/plugins/jasny/jasny-bootstrap.min.css');
                 $this->css('assets/css/plugins/colorpicker/bootstrap-colorpicker.min.css');
                 $this->css('assets/css/plugins/datapicker/datepicker3.css');
                 $this->css('assets/css/plugins/clockpicker/clockpicker.css');
                 $this->css('assets/css/plugins/iCheck/custom.css');
                 $this->css('assets/css/plugins/chosen/chosen.css');
                 $this->css('assets/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css');
                 $this->css('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css');
                 $this->css('assets/css/plugins/slick/slick.css');
                 $this->css('assets/css/plugins/slick/slick-theme.css');
                 $this->css("assets/css/plugins/select2/select2.css");
                 $this->css('assets/css/style.css');
                $this->js('assets/jQuery/jQuery-2.1.4.min.js');

                $this->js('assets/js/plugins/fullcalendar/moment.min.js');

                $this->js('assets/js/plugins/datapicker/bootstrap-datepicker.js');

                $this->js('assets/js/bootstrap.min.js');
                $this->js('assets/format/jquery.formatCurrency-1.4.0.min.js');
                $this->js('assets/js/plugins/toastr/toastr.min.js');
                $this->js('assets/js/plugins/sweetalert/sweetalert.min.js');
                $this->js('assets/custom/funcionesJS.js');
                $this->js('assets/datetimepicker/build/jquery.datetimepicker.full.min.js');
                $this->js('assets/custom/jquery.Rut.min.js');
                $this->js('assets/js/plugins/jasny/jasny-bootstrap.min.js');
                $this->js('assets/js/fileinput.min.js');
                $this->js('assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js');
                $this->js('assets/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js');
                $this->js('assets/js/plugins/chosen/chosen.jquery.js');
                $this->js('assets/js/plugins/iCheck/icheck.min.js');
                $this->js('assets/js/plugins/metisMenu/jquery.metisMenu.js');
                $this->js('assets/js/plugins/slimscroll/jquery.slimscroll.min.js');
                $this->js('assets/js/inspinia.js');
                $this->js('assets/js/jquery-ui.custom.min.js');
                $this->js('assets/js/plugins/fullcalendar/fullcalendar.min.js');
                $this->js('assets/charts/dist/Chart.js');
                $this->js('assets/js/plugins/clockpicker/clockpicker.js');
                $this->js('assets/js/plugins/daterangepicker/daterangepicker.js');
                $this->js('assets/js/locale-all.js');
                $this->js('assets/js/plugins/pace/pace.min.js');
                $this->js('assets/js/plugins/slick/slick.min.js');
                $this->js('assets/js/plugins/select2/select2.full.min.js');
                $this->js('assets/js/plugins/dataTables/datatables.min.js');
                $this->js('assets/custom/qztray.js');
        #  $this->js('assets/soundmanager/script/soundmanager2-jsmin.js');

        #layout
        if(isset($this->obj->layout_view))
        {
            $this->layout_view = $this->obj->layout_view;
        }


    }


    function view($view, $data = null, $return = false) {





         #template
         $data['header']             = $this->obj->load->view('layout/header', $data, true);
         $data['content_for_layout'] = $this->obj->load->view($view, $data, true);
        // $this->block_replace        = true;
         $output                     = $this->obj->load->view($this->layout_view, $data, $return);

        return $output;
    }

    /**
     * Agregar title a la pagina actual
     *
     * @param $title
     */
    function title($title) {
        $this->title = $title.' - '.$this->titleDefault;
    }

    function getTitle(){
        return $this->title;
    }

    /**
     * Agregar Javascript a la pagina actual
     * @param $item
     */
    function js($item){
        $this->js_list[] = $item;
    }

    function getJs(){
        $js = '';
        if($this->js_list){
            foreach ($this->js_list as $aux){
                $js .= '<script  type="text/javascript" src="'.$aux.'"></script>
        ';
            }
        }
        return $js;
    }

    /**
     * Agregar CSS a la pagina actual
     * @param $item
     */
    function css($item){
        $this->css_list[] = $item;
    }

    function getCss(){
        $css = '';
        if($this->css_list){
            foreach ($this->css_list as $aux){
                $css .= '<link rel="stylesheet" type="text/css"  href="'.$aux.'" />
        ';
            }
        }
        return $css;
    }


}
