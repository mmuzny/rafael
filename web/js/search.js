$(document).ready(function()
{
  $('.search input[type="submit"]').hide();
 
  $('#search_keywords').keyup(function(key)
  { 
    if (this.value.length >= 1)
    {
      $('#loader').show();
      $('#jobs').load($(this).parents('form').attr('action'),{ query: this.value + '*' }, function() { $('#loader').hide(); });
    } else 
    {
      $('#loader').show();
      $('#jobs').load($(this).parents('form').attr('action'),{ query: '' }, function() { $('#loader').hide(); });
    }
  });
});
