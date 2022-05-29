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
	let blogPostID = $(this).attr('data-post-id');
	let commentID = $(this).attr('data-comment-id');
	$('#deleteComment').attr('action', '/blog/' + blogPostID + '/comments/' + commentID);
	$('#deleteComment').submit();
});
