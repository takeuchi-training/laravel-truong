// Show add comment button
$('.btn-add-comment').on('click', function() {
	$(this).next().slideToggle(100);
});

// Show edit comment button
$('.btn-edit-comment').on('click', function() {
	let editComment = $(this).prev();

	editComment.prop('readonly', editComment.prop('readonly') === false ? true : false);
	editComment.toggleClass('form-control-plaintext');
	$(this).parent().next().toggleClass('d-none');
});

// Delete comment
$('.btn-delete-comment').on('click', function() {
	let commentID = $(this).attr('data-id');
	$('#deleteComment').attr('action', '/comments/' + commentID);
	$('#deleteComment').submit();
});
