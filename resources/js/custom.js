jQuery(function() {
   $('.tasks').dragndrop({
      onDrop:function( element, droppedElement ) {
         let priorities = [];
         $('input.hfield').each(function(i, obj) {
            priorities[$(obj).data('id')] = i+1;
         });
         console.log(priorities)
         $.ajax({
            url: '/reorder-tasks',
            method: 'post',
            data: { priority: priorities },
            success: function (response) {
               if (response.status == "success") {
                  $('.tasks tr td:first-child').each(function(i, obj) {
                     $(obj).html(i+1)
                  });                  
               }
            }
         });
      }
   });


   $('#projects').on('change', function() {
      $.ajax({
         url: '/get-tasks',
         method: 'get',
         data: { projectid: this.value },
         success: function (response) {
            if (response.status == "success") {
               $('#tasks').html('');
               response.tasks.forEach((task, i)=> {
                  $('#tasks')
                     .append($('<tr/>')
                        .append($('<td/>').append(i+1))
                        .append($('<td/>').append(task.name))
                        .append($('<td/>').append(task.created_at))
                     )
               });                 
            }
         }
      });
   });


   $('.multiselect').bsMultiSelect();

});


$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});