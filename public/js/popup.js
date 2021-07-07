$('#myModal').on('show.bs.modal', function (event) {
  
 
  
  var button = $(event.relatedTarget) // Button that triggered the modal
  var title = button.data('mytitle') // Extract info from data-* attributes
  var pid = button.data('pid')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  
  modal.find('#title').text(title)
  $('#editForm').attr('action', '/add-tocart/' + pid);
  modal.find('#pid').text(pid)
})

$('#sides').on('show.bs.modal', function (event) {
  
 
  
  var button = $(event.relatedTarget) // Button that triggered the modal
  var title = button.data('mytitle') // Extract info from data-* attributes
  var pid = button.data('pid')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  
  modal.find('#title').text(title)
  $('#editForm-sides').attr('action', '/add-tocart/' + pid);
  modal.find('#pid').text(pid)
})

$('#myModalDouble').on('show.bs.modal', function (event) {
  
 
  
  var button = $(event.relatedTarget) // Button that triggered the modal
  var title = button.data('mytitle') // Extract info from data-* attributes
  var pid = button.data('pid')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  
  modal.find('#title').text(title)
  $('#editFormDouble').attr('action', '/add-tocart/' + pid);
  modal.find('#pid').text(pid)
})

$('#myModalTripple').on('show.bs.modal', function (event) {
  
 
  
  var button = $(event.relatedTarget) // Button that triggered the modal
  var title = button.data('mytitle') // Extract info from data-* attributes
  var pid = button.data('pid')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  
  modal.find('#title').text(title)
  $('#editFormTripple').attr('action', '/add-tocart/' + pid);
  modal.find('#pid').text(pid)
})