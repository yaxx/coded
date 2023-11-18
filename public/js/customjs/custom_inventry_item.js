// var showPurcaseOption = document.getElementById('show_on_purchases');
        // var showInvoiceOption = document.getElementById('show_on_invoices');
        // var trackedOption = document.getElementById('tracked');
        /*
        *  WHEN YOU CLICK ON SHOW ON PURCHASE
        */
       let show_on_purchases= document.getElementById('show_on_purchases');
       showOnPurchaseAction();
       show_on_purchases.addEventListener("click",(e)=>{
          showOnPurchaseAction();
       });
       function showOnPurchaseAction(){
         let show_on_purchases= document.getElementById('show_on_purchases');
         if(show_on_purchases.checked==true){
               document.getElementById('show_incoming_tax').style.display="block";
               document.getElementById('purchase_ledger_id').removeAttribute("disabled");

                document.getElementById('purchase_ledger_id').setAttribute("required", "required");
                document.getElementById('default_incoming_tax_rate_id').setAttribute("required", "required");
           }
           else {
               document.getElementById('purchase_ledger_id').setAttribute("disabled","disabled");
                document.getElementById('show_incoming_tax').style.display="none";

                  document.getElementById('purchase_ledger_id').removeAttribute("required");
                  document.getElementById('default_incoming_tax_rate_id').removeAttribute("required");
           }
       }
/*
*  END SHOW ON PURCHASE
*/

/*
* WHEN YOU CLICK SHOW ON INVOICE
*/
      var show_on_invoices= document.getElementById('show_on_invoices');
      showOnInvoiceAction();
       show_on_invoices.addEventListener("click",(e)=>{
          showOnInvoiceAction();
       });

  function showOnInvoiceAction(){
    var show_on_invoices= document.getElementById('show_on_invoices');
      //if(e.target.checked==true){
        if(show_on_invoices.checked==true){
               document.getElementById('show_on_invoices_ledger').style.display= "block";
               document.getElementById('show_outgoing_tax').style.display="block";

                 document.getElementById('invoice_ledger_id').setAttribute("required", "required");
                document.getElementById('default_outgoing_tax_rate_id').setAttribute("required", "required");
           }
           else {
                document.getElementById('show_on_invoices_ledger').style.display="none";
               document.getElementById('show_outgoing_tax').style.display="none";

                document.getElementById('invoice_ledger_id').removeAttribute("required");
                document.getElementById('default_outgoing_tax_rate_id').removeAttribute("required");
           }
  }

/*
* END SHOW ON INVOICE
*/

/*
* WHEN TRACKED IS CLICKED
*/
let tracked= document.getElementById('tracked');
trackedAction();
tracked.addEventListener("click",(e)=>{
   trackedAction();
});
function trackedAction(){
let tracked= document.getElementById('tracked');
if(tracked.checked==true){

       document.getElementById('show_inventory_ledger').style.display="block";
       document.getElementById("show_on_invoices").checked=true;
       document.getElementById("show_on_purchases").checked=true;
      // document.getElementById("show_inventory_ledger").checked=true;

        document.getElementById("show_on_purchases").disabled = true;
       document.getElementById("show_on_invoices").disabled = true;


        document.getElementById('show_cost_of_goods_ledger').style.display="block";
        document.getElementById('show_incoming_tax').style.display="block";
        document.getElementById('show_purchase_ledger').style.display="none";
        document.getElementById('purchase_ledger_id').removeAttribute("disabled");
        document.getElementById('purchase_ledger_id').value= "";

       document.getElementById('show_on_invoices_ledger').style.display="block";
       document.getElementById('show_outgoing_tax').style.display="block";

       document.getElementById('show_re_order').style.display="block";

       // setting fields to required   
        document.getElementById('purchase_ledger_id').removeAttribute("required");
        document.getElementById('cost_of_goods_ledger_id').setAttribute("required", "required");
        document.getElementById('default_incoming_tax_rate_id').setAttribute("required", "required");

        document.getElementById('invoice_ledger_id').setAttribute("required", "required");
        document.getElementById('default_outgoing_tax_rate_id').setAttribute("required", "required");

        document.getElementById('re_order_point').setAttribute("required", "required");
        document.getElementById('inventory_asset_ledger_id').setAttribute("required", "required");

     }

   else {
        document.getElementById('show_cost_of_goods_ledger').style.display="none";
        document.getElementById('show_purchase_ledger').style.display="block";

        document.getElementById('show_inventory_ledger').style.display="none";

        document.getElementById("show_on_invoices").disabled = false;
        document.getElementById("show_on_purchases").disabled = false;

        document.getElementById('show_re_order').style.display="none";

        document.getElementById('cost_of_goods_ledger_id').removeAttribute("required");
        document.getElementById('re_order_point').removeAttribute("required");
        document.getElementById('inventory_asset_ledger_id').removeAttribute("required");

        //setting required fields
        document.getElementById('purchase_ledger_id').setAttribute("required", "required");

   }
}
