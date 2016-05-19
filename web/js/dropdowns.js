$(document).ready(function () {
    $('.default_cur').parents(".dropdown").find('.btn').html($('.default_cur').text() + ' <span class="caret"></span>');
    $('.default-lang').parents(".dropdown").find('.btn').html($('.default-lang').text() + ' <span class="caret"></span>');
});

$(".dropdown-menu li a").click(function () {
    $(this).parents(".dropdown").find('.dropdown-btn').html($(this).text() + ' <span class="caret"></span>');
    $(this).parents(".dropdown").find('.dropdown-btn').val($(this).data('value'));
});