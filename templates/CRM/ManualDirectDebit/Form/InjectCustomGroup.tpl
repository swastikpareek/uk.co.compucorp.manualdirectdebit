<div id="directDebitMandate" class="crm-accordion-wrapper crm-custom-accordion">
  <div class="crm-accordion-header">
    Direct Debit Mandate
  </div>

  <div id="customData1" class="crm-accordion-body">
    <table class="form-layout-compressed">
      <tbody>
      {foreach from=$customInputNames item=inputName}
        <tr>
          <td class="label"><label>{$form.$inputName.label}</label></td>
          <td class="html-adjust">
            {$form.$inputName.html}
          </td>
        </tr>
      {/foreach}
      </tbody>
    </table>
  </div>
</div>

{literal}
<script type="text/javascript">
  CRM.$(function($) {
    moveDirectDebitMandateFormFields();
    setDirectDebitStartDate();

    CRM.$('input[name=receive_date]').parent().change(function () {
      setDirectDebitStartDate();
    });

    function moveDirectDebitMandateFormFields(){
      CRM.$('#directDebitMandate').insertAfter(CRM.$('#billing-payment-block'));

      var directDebitID = {/literal}{$directDebitPaymentInstrumentId}{literal};

      if (CRM.$('#payment_instrument_id option:selected').val() != directDebitID) {
        CRM.$('#directDebitMandate').hide();
      }

      CRM.$('#payment_instrument_id').change(function () {
        if (CRM.$('#payment_instrument_id option:selected').val() == directDebitID) {
          CRM.$('#directDebitMandate').show();
        } else {
          CRM.$('#directDebitMandate').hide();
        }
      });
    }

    function setDirectDebitStartDate() {
      var receiveFieldValue = CRM.$('input[name=receive_date]').length > 0 ? CRM.$('input[name=receive_date]').val() : false;
      var mandateStartDateField = CRM.$('#directDebitMandate_start_date').length > 0 ? CRM.$('#directDebitMandate_start_date') : false;

      if(receiveFieldValue === false || mandateStartDateField === false){
        return false;
      }

      receiveFieldValue = receiveFieldValue.split('/');
      // converts `receive Date` to js Date object, so we have to decrease month because in js month begin count from 0
      var receiveDate = new Date(receiveFieldValue[2], receiveFieldValue[0]-1, receiveFieldValue[1]);

      var minimumDaysToFirstPayment = {/literal}{$minimumDaysToFirstPayment}{literal};

      if (typeof minimumDaysToFirstPayment === 'undefined'){
          minimumDaysToFirstPayment = 0;
      }
      var mandateStartDate = new Date(receiveDate.setDate(receiveDate.getDate() - minimumDaysToFirstPayment));

      // converts js date object `mandateStartDate` to human readable value, so we have to increase month
      var startDateField = mandateStartDate.getFullYear() + '-' + (mandateStartDate.getMonth() + 1) + '-' + mandateStartDate.getDate();
      mandateStartDateField.val(startDateField).change();
    }

  });
</script>
{/literal}

