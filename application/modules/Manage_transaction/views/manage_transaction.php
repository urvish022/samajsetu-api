<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <?php $this->load->view('layout/theme.php'); ?>    
      <!-- END THEME PANEL -->
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <a href="<?=base_url('Dashboard');?>"><?=$this->lang->line('dashboard_ttl');?></a>
               <i class="fa fa-circle"></i>
            </li>
            <li>
               <span><?=$this->lang->line('manage_transaction');?>
               </span>
            </li>
         </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h1 class="page-title sbold">
        <?=$this->lang->line('manage_transaction');?>
         <small><?=$this->lang->line('transaction_desc');?></small>
      </h1>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet light bordered">
               <div class="portlet-body" id="blockui_sample_1_portlet_body">
                  <ul class="nav nav-tabs" id="nav">
                     <li class="active">
                        <a href="#tab_1_1" data-toggle="tab">
                        <?=$this->lang->line('view_trans');?>
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_2" id="tab_1_2_nav" style="display: none;" data-toggle="tab"> 
                        <?=$this->lang->line('edit_trans');?> 
                        </a>
                     </li>
                     <li>
                        <a href="#tab_1_3" id="tab_1_3_nav" data-toggle="tab"> 
                        <?=$this->lang->line('aeei_trans');?> 
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane fade active in" id="tab_1_1">
                        <!-- Begin: life time stats -->
                        <div class="portlet light portlet-fit portlet-datatable">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-rupee"></i>
                                 <span class="caption-subject sbold uppercase"><?=$this->lang->line('view_trans');?></span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-container">
                                 <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"
                                  id="dataTable">
                                    <thead>
                                       <tr>
                                          <th> # </th>
                                          <th> <?=$this->lang->line('ord_id');?> </th>
                                          <th> <?=$this->lang->line('trans_amt');?> </th>
                                          <th> <?=$this->lang->line('tot_amt');?> </th>
                                          <th> <?=$this->lang->line('date');?> </th>
                                          <th> <?=$this->lang->line('type');?> </th>
                                          <th> <?=$this->lang->line('pay_status');?> </th>
                                          <th> <?=$this->lang->line('action');?> </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <!-- End: life time stats -->
                     </div>

                     <div class="tab-pane fade" id="tab_1_2">
                        <div class="portlet light portlet-fit portlet-form ">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-rupee"></i>
                                 <span class="caption-subject sbold uppercase"><?=$this->lang->line('edit_trans');?> </span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal tra_form" method="post" id="tra_form">
                                <input type="hidden" name="tra_id" id="tra_id">
                                 <div class="form-body">
                                    <table class="table table-bordered table-hover" width="100%">
                                            <thead>
                                                <tr>
                                                    <th> <?=$this->lang->line('village');?>  </th>
                                                    <th><?=$this->lang->line('name');?>  </th>
                                                    <th> <?=$this->lang->line('member_mobile');?>  </th>
                                                    <th> <?=$this->lang->line('photo');?>  </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <td id="td_village"></td>
                                                  <td id="td_mname"></td>
                                                  <td id="td_mobile"></td>
                                                  <td id="td_photo"></td>
                                                </tr>
                                            </tbody>
                                    </table>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold"><?=$this->lang->line('trans_id');?> 
                                       
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-info"></i>
                                             </span>
                                             <input type="text" class="form-control" id="TXNID" 
                                             name="TXNID" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">
                                               <?=$this->lang->line('trans_id');?>
                                             </span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold"><?=$this->lang->line('ord_id');?>
                                       
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-info"></i>
                                             </span>
                                             <input type="text" class="form-control" id="ORDERID" 
                                             name="ORDERID" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block"><?=$this->lang->line('ord_id');?></span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold"><?=$this->lang->line('batransact_id');?>
                                       
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-bank"></i>
                                             </span>
                                             <input type="text" class="form-control" id="BANKTXNID" 
                                             name="BANKTXNID" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block"><?=$this->lang->line('batransact_id');?></span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">
                                        <?=$this->lang->line('trans_amt');?>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-rupee"></i>
                                             </span>
                                             <input type="text" class="form-control" id="TXNAMOUNT" 
                                             name="TXNAMOUNT" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block"><?=$this->lang->line('trans_amt');?>
                                       </span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold"><?=$this->lang->line('tot_amt');?>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-rupee"></i>
                                             </span>
                                             <input type="text" class="form-control" id="TOTALAMT" 
                                             name="TOTALAMT" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block"><?=$this->lang->line('tot_amt');?>
                                       </span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">
                                        <?=$this->lang->line('pay_status');?>
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <select class="form-control select2me" name="STATUS" id="STATUS">
                                            <option></option>
                                            <option value="TXN_SUCCESS">TXN_SUCCESS</option>
                                            <option value="PENDING">PENDING</option>
                                            <option value="TXN_FAILURE">TXN_FAILURE</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold"><?=$this->lang->line('resp_code');?>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-info"></i>
                                             </span>
                                             <input type="text" class="form-control" id="RESPCODE" 
                                             name="RESPCODE" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block"><?=$this->lang->line('resp_code');?></span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold"><?=$this->lang->line('resp_msg');?>
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-info"></i>
                                             </span>
                                             <input type="text" class="form-control" id="RESPMSG" 
                                             name="RESPMSG" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block"><?=$this->lang->line('resp_msg');?>
                                             </span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold"><?=$this->lang->line('tra_date');?>
                                       
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-calendar"></i>
                                             </span>
                                             <input type="text" class="form-control" id="TXNDATE" 
                                             name="TXNDATE" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block"><?=$this->lang->line('tra_date');?></span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold"><?=$this->lang->line('gate_name');?>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-info"></i>
                                             </span>
                                             <input type="text" class="form-control" id="GATEWAYNAME" 
                                             name="GATEWAYNAME" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block"><?=$this->lang->line('gate_name');?></span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">
                                        <?=$this->lang->line('bank_name');?>
                                       
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-bank"></i>
                                             </span>
                                             <input type="text" class="form-control" id="BANKNAME" 
                                             name="BANKNAME" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block"><?=$this->lang->line('bank_name');?></span>
                                          </div>
                                       </div>
                                    </div>

                                     <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">
                                        <?=$this->lang->line('pay_mode');?>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-info"></i>
                                             </span>
                                             <input type="text" class="form-control" id="PAYMENTMODE" 
                                             name="PAYMENTMODE" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block"><?=$this->lang->line('pay_mode');?></span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold"><?=$this->lang->line('ad_cate');?>
                                       </label>
                                       <div class="col-md-9">
                                          <select class="form-control select2me" name="CATEGORY" id="CATEGORY" disabled="disabled">
                                            <option></option>
                                            <option value="slider_ad">slider_ad</option>
                                            <option value="business_ad">business_ad</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">
                                       <?=$this->lang->line('detail');?>
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                             <textarea class="form-control" rows="3" id="DETAILS"></textarea>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold"><?=$this->lang->line('plan_type');?>
                                       
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-info"></i>
                                             </span>
                                             <input type="text" class="form-control" id="PLAN" 
                                             name="PLAN" readonly="readonly">
                                             <div class="form-control-focus"> </div>
                                             <span class="help-block">Plan</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">
                                       <?=$this->lang->line('checksumhash');?>
                                       
                                       </label>
                                       <div class="col-md-9">
                                             <textarea class="form-control" rows="3" id="CHECKSUMHASH" 
                                             readonly="readonly"></textarea>
                                       </div>
                                    </div>
                                    
                                 </div>
                                 <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="update_btn" class="btn green"><?=$this->lang->line('update')?></button>
                                                <button type="reset" onclick="location.reload()" class="btn default"><?=$this->lang->line('reset')?></button>
                                             </div>
                                          </div>
                                       </div>
                              </form>
                              <!-- END FORM-->
                           </div>
                        </div>
                     </div>

                     <div class="tab-pane fade" id="tab_1_3">
                        <div class="portlet light portlet-fit portlet-form ">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-rupee"></i>
                                 <span class="caption-subject sbold uppercase"><?=$this->lang->line('aeei_trans');?> </span>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <!-- BEGIN FORM-->
                              <form class="form-horizontal extransaction_form" method="post" id="extransaction_form">
                                <input type="hidden" name="tra_id" id="ex_tra_id">
                                 <div class="form-body">
                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold">
                                        <?=$this->lang->line('type');?> 
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <select class="form-control select2me" name="TYPE" id="TRTYPE">
                                            <option></option>
                                            <option value="INCOME">INCOME</option>
                                            <option value="EXPENSE">EXPENSE</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="control-label col-md-3 sbold"><?=$this->lang->line('tra_date');?> 
                                       <span class="required">*</span>
                                      </label>
                                       <div class="col-md-9">
                                        <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-calendar sbold"></i>
                                             </span>
                                             <input class="form-control date-picker" 
                                              id="TRTXNDATE" type="text" name="TXNDATE">
                                             <div class="form-control-focus"> </div>
                                            <span class="help-block"> <?=$this->lang->line('tra_date');?> </span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">
                                        <?=$this->lang->line('trans_amt');?> 
                                        <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                             <i class="fa fa-rupee"></i>
                                             </span>
                                             <input type="text" class="form-control" 
                                             id="TRTOTALAMT" name="TOTALAMT">
                                             <div class="form-control-focus"></div>
                                             <span class="help-block"><?=$this->lang->line('trans_amt');?> </span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label sbold">
                                       <?=$this->lang->line('detail');?>
                                       <span class="required">*</span>
                                       </label>
                                       <div class="col-md-9">
                                             <textarea class="form-control" rows="3" id="TRDETAILS"></textarea>
                                       </div>
                                    </div>
                                    
                                 </div>
                                 <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-3 col-md-9">
                                                <button type="button" id="submit_btn" class="btn green"><?=$this->lang->line('submit')?></button>
                                                <button type="reset" onclick="location.reload()" class="btn default"><?=$this->lang->line('reset')?></button>
                                             </div>
                                          </div>
                                       </div>
                              </form>
                              <!-- END FORM-->
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="throbber" style="display:none;">
        <img src="<?=ASSETS_PATH?>global/img/loading-spinner-default.gif" />&nbsp;Please wait! Sending Details...
      </div>
   </div>
   <!-- END CONTENT BODY --> 
 
<div id="modal_theme_delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header bg-red">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h6 class="modal-title">Delete</h6>
            </div>
            <form id="delete_form" method="post" name="delete_form">
              <input type="hidden" name="tra_id" id="delete_tra_id">
            <div class="modal-body">
                <h6 class="text-semibold"><i class="fa fa-trash"></i>&nbsp;Are you sure do you want to delete this data?</h6>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="delete_data()">Delete
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- END CONTENT -->
<script type="text/javascript">

var view_tran_url = "<?=base_url('Manage_transaction/view_datatable_transactions')?>";     
var save_transaction = "<?=base_url('Manage_transaction/save_transaction')?>";
var fetch_details = "<?=base_url('Manage_transaction/get_data')?>";
var delete_single_data = "<?=base_url('Manage_transaction/delete_single_data')?>";
var update_transaction = "<?=base_url('Manage_transaction/update_transaction')?>";
var dataTable = '';

$(document).ready(function() {
    get_transaction_tbl();
});

function delete_details(id)
{
  $('#delete_tra_id').val(id);
  $('#modal_theme_delete').modal('show');
}

function edit_details(id)
{
  $.ajax({
    url : fetch_details,
    type: "POST",
    data: { tra_id : id},
    dataType: "JSON",
    success: function(data)
    {
      if(data[0].ENTRYTYPE == 1)
      {
        get_villages_list();

        $('#tab_1_2_nav').show();
        $('#nav a[href="#tab_1_2"]').tab('show');

       $('#td_village').html(data[2].eng_name);
       $('#td_mname').html(data[1].full_name_eng);
       $('#td_mobile').html(data[1].mobile_no);
       $('#td_photo').html('<img src="<?=ASSET_USER_PHOTO?>'+data[1].photo+'" height="100" width="100">');

       $('#tra_id').val(data[0].tra_id); 
       $('#TXNID').val(data[0].TXNID);
       $('#ORDERID').val(data[0].ORDERID);
       $('#BANKTXNID').val(data[0].BANKTXNID);
       $('#TXNAMOUNT').val(data[0].TXNAMOUNT);
       $('#TOTALAMT').val(data[0].TOTALAMT);
       $('#RESPCODE').val(data[0].RESPCODE);
       $('#RESPMSG').val(data[0].RESPMSG);
       $('#GATEWAYNAME').val(data[0].GATEWAYNAME);
       $('#BANKNAME').val(data[0].BANKNAME);
       $('#PAYMENTMODE').val(data[0].PAYMENTMODE);
       $('#CHECKSUMHASH').val(data[0].CHECKSUMHASH);
       
       $('#PLAN').val(data[0].PLAN);
       $('#DETAILS').val(data[0].DETAILS);

       $('#STATUS').width("100%");
       $('#STATUS').select2().select2('val',data[0].STATUS);
       $('#STATUS').val(data[0].STATUS).trigger('change');
       
       $('#CATEGORY').width("100%");
       $('#CATEGORY').select2().select2('val',data[0].CATEGORY);
       $('#CATEGORY').val(data[0].CATEGORY).trigger('change');

       var tdte = custom_date(data[0].TXNDATE);
       $('#TXNDATE').val(tdte);
      }
      else
      {
        $('#tab_1_3_nav').show();
        $('#nav a[href="#tab_1_3"]').tab('show');

        $('#ex_tra_id').val(data[0].tra_id);
        
        $('#TRTYPE').width("100%");
        $('#TRTYPE').select2().select2('val',data[0].TYPE);
        $('#TRTYPE').val(data[0].TYPE).trigger('change');

        var tdte = custom_date(data[0].TXNDATE);
        $('#TRTXNDATE').val(tdte);
      
        $('#TRTOTALAMT').val(data[0].TOTALAMT);
        $('#TRDETAILS').val(data[0].DETAILS);
      }
    }
  });
}

$('#submit_btn').click(function(e) {
  e.preventDefault();
  if ($('.extransaction_form').valid()) 
      save_transaction_data();
  });

$('#update_btn').click(function(e) {
  e.preventDefault();
  if ($('.tra_form').valid()) 
      update_transaction_data();
  });

function update_transaction_data()
{
  if($('#DETAILS').val() == '')
  {
    alert('Please enter transaction details');
  }
  else
  {
    $('#update_btn').text('Saving...'); //change button text
    $('#update_btn').attr('disabled',true);

    var data = new FormData($('#tra_form')[0]);
    data.append('DETAILS', $('#DETAILS').val());
    
    $.ajax({
      url : update_transaction,
      method: "POST",
      dataType: "JSON",
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data)
      {   
        $('#update_btn').text('Submit');
        $('#update_btn').attr('disabled',false); //set button enable       

        if(data.update_status)
          update_modal();
        else
          fail_update_modal();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        $('#update_btn').text('Submit');
        $('#update_btn').attr('disabled',false); //set button enable       

        alert('Error! Something Went Wrong'); 
      }
    });
  }
}

function save_transaction_data()
{
  if($('#TRDETAILS').val() == '')
  {
    alert('Please Enter Transaction Details');
  }
  else
  { 
    $('#submit_btn').text('Saving...'); //change button text
    $('#submit_btn').attr('disabled',true);

    var data = new FormData($('#extransaction_form')[0]);
    data.append('DETAILS', $('#TRDETAILS').val());
    
    $.ajax({
      url : save_transaction,
      method: "POST",
      dataType: "JSON",
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data)
      {   
        $('#submit_btn').text('Submit');
        $('#submit_btn').attr('disabled',false); //set button enable       

        if(data.insert_status)
          success_modal();
        else if(data.update_status == true)
          update_modal();
        else if(data.update_status == false)
          fail_update_modal();
        else
         fail_modal();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        $('#submit_btn').text('Submit');
        $('#submit_btn').attr('disabled',false); //set button enable       

        alert('Error! Something Went Wrong'); 
      }
    });
  }
}

function get_transaction_tbl()
{
  dataTable = $('#dataTable').DataTable({ 
        dom: 'Bfrtip',
        lengthMenu: [[100, 500, 1000, -1], [100, 500, 1000, "All"]],
        buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6]
                    }
                },
                {
                    extend : 'excelHtml5',
                    exportOptions:{
                        columns: [0,1,2,3,4,5,6]
                    }
                },
                {
                    extend: 'pageLength',
                },
            'colvis'
        ],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": view_tran_url,
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1], //last column
            "orderable": false, //set not orderable
        },
        ],

    });  
}

function delete_data() {
  $.ajax({
    url: delete_single_data,
    type: "POST",
    data: $('#delete_form').serialize(),
    dataType: "JSON",
    success: function (data) {
      $('#modal_theme_delete').modal('hide');

      if (data.delete_status) 
        delete_modal();
      else 
        fail_delete_modal();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $('#modal_theme_delete').modal('hide');
      alert('Error! Something Went Wrong');
    }

  });
}
</script>                
             