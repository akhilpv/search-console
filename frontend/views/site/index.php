<?php
   use yii\helpers\Html;
   use yii\helpers\Url;
   use yii\helpers\ArrayHelper;
   use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
const FORM_TEMPLATE  = '<div class="row form-group"><div class="col-sm-3 text-right pt-1"><label>{label}</label>
   </div><div class="col-sm-6">{input}{error}{hint}</div></div>';
   
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Stock Exchange!</h1>

        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
            <?php
                 $form =     ActiveForm::begin(['id'=>'companies','options' => ['enctype' => 'multipart/form-data']]);
            
           echo $form->field($model, 'company_name',['template' => FORM_TEMPLATE,])
                          ->dropDownList([], ['prompt'=>'Company Name','class'=>'js-states form-control','onchange' => '
                          $.post(
                             "' . Url::toRoute('get-points') . '", 
                             {id: $(this).val()}, 
                             function(res){
                                $(".table-responsive").html(res);
                             }
                          );
                    '])->label(false);
                      
           
                      
            ?>


                  <?php
               ActiveForm::end();
            ?>   
            </div>
            <div class="col-lg-12">
               <div class="table-responsive">
               
               </div>
            </div>
        </div>

    </div>
</div>
<?php

$this->registerJS("
$('.js-states').select2({
   placeholder: 'Type Comany Name',
   
   ajax: {
     url:  '".Url::toRoute('get-companies')."',
     data: function (params) {
      var queryParameters = {
        q: params.term,
      }
      
      return queryParameters;
    },
     dataType: 'json',
     processResults: function (data) {
      
       return {
         results: data
         
       };
     },
     cache: true
   }
});");
