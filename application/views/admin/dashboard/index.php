  <style type="text/css">
    .fc-header .fc-button {
       margin-right: 5px;
     }
     .fc-header .fc-button {
        margin-top: 40px;
        margin-bottom: 2em;
        vertical-align: top;
    }
    .fc-border-separate{
      background-color: #fff;
    }
    .fc-corner-left {
    margin-left: 1px;
    }
    .fc-state-default, .fc-state-default .fc-button-inner {
      border-style: solid;
      border-color: #12a9c3 #1188a2 #0ebba9;
      background: #0ab59d;
      color: #fff;
      padding: 5px;
    }
    .fc-state-default {
        border-style: solid;
        border-width: 1px 0;
    } 
    .fc-button {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }
    .fc-header{
      margin-top: 15px;
      border-color: #12a9c3 #1188a2 #0ebba9;
    }
    .fc-first .fc-last{
      height: 40px;
      padding-top: 8px;
    }
    .fc-sun,.fc-mon,.fc-tue,.fc-wed,.fc-thu,.fc-fri{
      padding-top: 8px;
    }
    .fc-event-skin {
      border-color: #078e89;
      background-color: #109289;
      color: #fff;
    }
    .fc-event-inner {
      position: relative;
      width: 100%;
      height: 100%;
      border-style: solid;
      border-width: 0;
      overflow: hidden;
    }
    .fc-border-separate tr.fc-last th, .fc-border-separate tr.fc-last td {
      border-bottom-width: 2px;
      padding-top: 8px;
    }
    html .fc, .fc table {
        font-size: 1.2em;
    }
    .fc-button-content {
      position: relative;
      float: left;
      height: 1em;
      line-height: 1.9em;
      padding-bottom: 2em;
      white-space: nowrap;
    }
    .fc-header-title h2 {
      margin-top: 0;
      color: #032b27;
      white-space: nowrap;
    }
    #bg-blue {
      color: #f6c23e ;
      border-radius: 3px;
      text-align: center;
      background-color: #fff;
      border-left: 5px solid #f6c23e!important;
    }
    #bg-brown{
      color: #1cc88a;
      background-color: #fff;
      border-left: 5px solid #1cc88a;
      border-radius: 3px;
      text-align: center;
    }
    #bg-dark{
      color: #078e89;
      background-color: #fff;
      border-left: 5px solid #078e89;
      border-radius: 3px;
      text-align: center;
    }
    .dark-bg {
      color: #fff;
      background-color: #086c61;
    }
    .shell .fa {
      transition: all 1s ease-in-out;
      color: #1cc88a!important;
    } 
    #dark-bg {
      color: #078e89;
      background-color: #046f5eed;
    }
    #Deposits{
      font-size: 20px;
      font-family: coda;
    }
    #Withdraws{
      font-size: 20px;
      font-family: coda;
    }
    .deposit{
      background-color: #11aba1;
      color: #fff;
    }
    .withdraw{
      background-color: #11aba1;
      color: #fff;
    }
    #bg-dark{
      background-color: #fff;
      height: 80px;
    }
    .info-box .count {
      margin-top: 10px;
      font-size: 34px;
      font-weight: 700;
    }
  </style>
  <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <br><br><br><br>
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header">
              <i class="fa fa-laptop"></i>
              <?=strtoupper($this->systemdata->sname); ?>
            </h3>
          </div>
        </div>

        <div class="row">
          <?php if ($this->userdata['role'] == 1 || $this->userdata['role'] == 3) : ?>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
             <div class="info-box shadow shell" id="bg-blue">
                <i class="fa fa-users" style="color: #f1f1f1 !important;"></i>
                <div class="count">Members</div>
                <div style="font-size: 38px;"><?=$members_count;?></div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="info-box shadow shell" id="bg-brown">
                <i class="fa fa-usd" style="color: #f1f1f1 !important;"></i>  
                <div style="font-size: 22px;">Savings Accounts</div>
                <div style="font-size: 60px;"><?=$savings_count;?></div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <div class="info-box shell shadow" id="bg-dark">
                <i class="fa fa-table" is="fa-sab" style="color: #f1f1f1 !important;"></i>
                <div style="font-size: 20px;">Savings Account Balance</div>
                <div style="font-size: 26px; padding-top: 10px;"><?=number_format($total_savings_account_balance, 2); ?></div>
              </div>
              <!--/.info-box-->
            </div> 
            <!--/.col-->
          <?php elseif ($this->userdata['role'] == 2) : ?> 
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="info-box shadow shell" id="bg-blue">
                <i class="fa fa-users" style="color: #f1f1f1 !important;"></i>
                <div style="font-size: 25px;" >Account Number</div>
                <div style="font-size: 20px; color: #aaa; padding-top: 10px;"><?=$account_no; ?></div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="info-box shadow shell" id="bg-brown">
                <i class="fa fa-id-card" style="color: #f1f1f1 !important;"></i>  
                <div style="font-size: 30px;">Member ID</div>
                <div class="count"><?=$this->userdata['member_id'];?></div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <div class="info-box shell shadow" id="bg-dark">
                <i class="fa fa-random" is="fa-sab" style="color: #f1f1f1 !important;"></i>
                <div style="font-size: 25px;">Account Balance</div>
                <div style="font-size: 30px; padding-top: 10px;"><b><?=number_format($member_balance, 2);?></b></div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->
          <?php endif; ?>
        </div>
        <!--/.row cards-->
        <div class="row " style="margin-top:10px;">
          <!-- calender -->
          <div class="col-lg-6 col-md-3 col-sm-12 col-xs-12 " style="margin-top:37px;margin-bottom:10px;background:rgba(204, 200, 200, 0.459); height: auto; width: 100%;">
              <div class="panel-body">
                  <!-- Widget content -->
                  <!--Daily  Deposits and Withdraw content Table -->
                 <div class="row">
                  <!-- Daily Deposit Table -->
                    <div class="col-md-6">
                      <h5 class="text-dark mt-3" id="Deposits">Daily Deposits Information</h5>
                      <hr>
                      <table id="deposit_table" class="table table-striped table-bordered table-hover" width="100%">
                        <thead class="deposit">
                          <td>S.No</td>
                          <td>Member Name</td>
                          <td>Deposit Amount</td>
                           <td>Deposit Date</td>
                        </thead>
                        <tbody id="generate_deposit">
                          
                        </tbody>
                      </table>
                    </div>
                  <!--Daily Withdraw table -->
                   <div class="col-md-6">
                      <h5 class="text-dark mt-3" id="Withdraws">Daily Withdraws Information</h5>
                      <hr>
                      <table id="withdraw_table" class="table table-striped table-bordered table-hover" width="100%">
                          <thead class="withdraw">
                            <td>S.N0</td>
                            <td>Member Name</td>
                            <td>Withdraw Amount</td>
                            <td>Withdraw Date</td>
                          </thead>
                          <tbody id="generate_withdraw">
                            
                          </tbody>
                      </table>
                  </div>
              </div> 
            </div>
          </div>
        </div>

        <script type="text/javascript">
          var url,save_method;
          var base_url = '<?php echo base_url();?>';
          $(document).ready(function(){
              $('#dashboardNav').addClass('active');
              daily_deposit_reports();

              //$('#deposit_table').DataTable();
              function daily_deposit_reports(){
                $.ajax({
                  type  : 'ajax',
                  url   : '<?php echo base_url('admin/deposit/generate_daily_deposit');?>',
                  async : false,
                  dataType : 'json',
                  success: function(data){
                    var html = '';
                    var i;
                    var count = 1;
                    if (data.length > 0) {
                      for(i=0; i<data.length; i++, count++){
                          html += '<tr>'+
                            '<td>'+count+'</td>'+
                            '<td>'+data[i].member_name+'</td>'+
                            '<td>'+data[i].transaction_amount+'</td>'+
                            '<td>'+data[i].transaction_date+' '+data[i].transaction_at+'</td>'+
                          '</tr>';
                      }

                      $('#generate_deposit').html(html);  
                    }else{
                      $('#generate_deposit').html('<tr><td colspan="4" class="text-center text-danger">No Records Available</td></tr>');  
                    }
                  }
                })
              }

              // daily withdraw transaction reports
              daily_withdraw_reports();

              //$('#withdraw_table').DataTable();
              function daily_withdraw_reports(){
                $.ajax({
                  type  : 'ajax',
                  url   : '<?php echo base_url('admin/withdraw/generate_daily_withdraw_transaction');?>',
                  async : false,
                  dataType : 'json',
                  success: function(data){
                    var html = '';
                    var i;
                    var count = 1;
                    if (data.length > 0) {
                      for(i=0; i<data.length; i++, count++){
                          html += '<tr>'+
                            '<td>'+count+'</td>'+
                            '<td>'+data[i].member_name+'</td>'+
                            '<td>'+data[i].transaction_amount+'</td>'+
                            '<td>'+data[i].transaction_date+' '+data[i].transaction_at+'</td>'+
                          '</tr>';
                      }

                      $('#generate_withdraw').html(html);  
                    }else{
                      $('#generate_withdraw').html('<tr><td colspan="4" class="text-center text-danger">No Records Available</td></tr>');  
                    }
                  }
                })
              }
          });
        </script>
        