/*global $*/

$(document).ready(function() {
  // Autoresize text area boxes with autoresize class
  // https://stackoverflow.com/questions/454202/creating-a-textarea-with-auto-resize
  $('textarea.autoresize').each(function () {
    this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
  }).on('input', function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
  });
  
  // Toggles hidden table tows on the orders section of the customer details page
  $(".toggle-hidden-rows").on("click", function(){
    var hiddenRow = $(".hidden-row");
    hiddenRow.toggleClass("hide");
    if(hiddenRow.is(".hide")){
      $(this).text($(this).data("show-text"));
    } else {
      $(this).text($(this).data("hide-text"));
    }
  }); 
  
  //$(this).closest("tr").find(".hidden-row");
  
  // Toggles hidden forms on customer and product details pages to reveal editable fields
  $(".toggle-hidden-form").on("click", function(){
    $(".hidden-form").toggleClass("hide");
    $(".customer-data, .product-data").toggleClass("hide");
  });
  
  // Toggles table forms between editable and read only
  $(".toggle-edit-field").on("click", function(){
    var viewField = $(this).closest("tr").find(".view-field");
    viewField.toggleClass("hide");
    var editField = $(this).closest("tr").find(".edit-field");
    editField.toggleClass("hide");
  });
});