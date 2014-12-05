jQuery(document).ready(function($) {

  var all_platform   = ["Joomla","Magento","Wordpress","Drupal","Typo3","PrestaShop","Eigen CMS"];
  var platform_template = Mustache.compile($.trim($("#platform_template").html()))
      ,$platform_container = $('#platform_criteria') 

  $.each(all_platform, function(i, g){
    $platform_container.append(platform_template({platform: g}));
  });
        
  var all_specialism = ["Design","Implementatie","Optimalisatie","Security","SEO","Social Media","Usability","Training","Advies"];
  var specialism_template = Mustache.compile($.trim($("#specialism_template").html()))
      ,$specialism_container = $('#specialism_criteria') 

  $.each(all_specialism, function(i, g){
    $specialism_container.append(specialism_template({specialism: g}));
  });
  
  var all_activity   = ["Implementeren nieuwe site","Ombouwen naar ander CMS","Upgrade bestaande site","Bug fixing","Modules en plugins","Koppeling backoffice","Webapplicaties bouwen","Technisch Beheer","Mobile Commerce","Hack Troubleshooting","Projectmanagement"]
  var activity_template = Mustache.compile($.trim($("#activity_template").html()))
      ,$activity_container = $('#activity_criteria') 

  $.each(all_activity, function(i, g){
    $activity_container.append(activity_template({activity: g}));
  });

   $('#provincie_all').closest('ul').children().find(':checkbox').prop('checked', true);

   $('#provincie_all').on('click',function(){
     $(this).closest('ul').children().find(':checkbox').prop('checked', $(this).is(':checked'));
   });

  $.each(Partners, function(i, m){ m.id = i+1; });
  window.mf = PartnerFilter(Partners);

  $('#platform_criteria :checkbox').prop('checked', true);
  $('#all_platform').on('click', function(e){
    $('#platform_criteria :checkbox:gt(0)').prop('checked', $(this).is(':checked'));
    mf.filter();
  });

  $('#specialism_criteria :checkbox').prop('checked', true);
  $('#all_specialism').on('click', function(e){
    $('#specialism_criteria :checkbox:gt(0)').prop('checked', $(this).is(':checked'));
    mf.filter();
  });

  $('#activity_criteria :checkbox').prop('checked', true);
  $('#all_activity').on('click', function(e){
    $('#activity_criteria :checkbox:gt(0)').prop('checked', $(this).is(':checked'));
    mf.filter();
  });

});

var PartnerFilter = function(data){
  var template = Mustache.compile($.trim($("#template").html()));

  var view = function(partner){
    partner.platforms = partner.platform.join(', ');
    partner.specialisms = partner.specialism.join(', ');
    partner.activities = partner.activity.join(', ');
    return template(partner);
  };
  var callbacks = {
    after_filter: function(result){
      $('#total_partners').text(result.length);
    },
    before_add: function(data){
      var offset = this.data.length;

      if (offset == 450) this.clearStreamingTimer();
      
      for(var i = 0, l = data.length; i < l; i++)
        data[i].id = offset + i + 1;
    },
    after_add: function(data){
      var percent = (this.data.length - 250)*100/250;
      $('#stream_progress').text(percent + '%').attr('style', 'width: '+ percent +'%;');
      if (percent == 100) $('#stream_progress').parent().fadeOut(1000);
    }
  };

  options = {
    filter_criteria: {
      platform:     ['#platform_criteria input:checkbox:gt(0)', 'platform'],
      specialism:   ['#specialism_criteria input:checkbox:gt(0)', 'specialism'],
      activity:     ['#activity_criteria input:checkbox:gt(0)', 'activity'],
      provincie:    ['#provincie_list input:checkbox' , 'provincie']
    },
    and_filter_on: false,
    callbacks: callbacks,
    search: {input: '#searchbox'}
  }

  return FilterJS(data, "#partners", view, options);
}
