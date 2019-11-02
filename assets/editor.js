"use strict";

$("div.commands").on("command", function(event, selector, cmd, value){
  selector.parents("div.mask").find("div.editor").focus();
  document.execCommand(cmd, false, value);
})

$('div.commands > img[data-cmd]').click(function(){
  $("div.commands").trigger("command", [$(this), $(this).data('cmd'), $(this).data('val')]);
})

$('select.formatBlock').change(function(){
  $("div.commands").trigger("command", [$(this), 'formatBlock', $(this).val()]);
  $(this).val('');
})

$('select.fontName').change(function(){
  $("div.commands").trigger("command", [$(this), 'fontName', $(this).val()]);
})

$('select.fontSize').change(function(){
  $("div.commands").trigger("command", [$(this), 'fontSize', $(this).val()]);
})

$('form').submit(function(){
  $('div.editor').each(function(){
    var $hiddenField = $(this).parents("div.mask").parent().parent().find("input[type='hidden']");
    $hiddenField.val($(this).html());
  })
})

$("img.fore-color, img.back-color").click(function(){
  var pos = $(this).offset();
  $(this).parent().find("div.colors").offset({
    left: pos.left,
    top: pos.top + 16
  }).show();
})

$("div.color").click(function(){
  $("div.commands").trigger("command", [$(this), 'backColor', $(this).css("background-color")]);
})
