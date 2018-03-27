$(document).ready(function() {
	$('#SignUp').click(function() {
		$('#formInscription').css('display','block');
	});
	$('#fermerAddUserForm').click(function() {
		$('#formInscription').css('display','none');
	});

	$('#SignIn').click(function() {
		$('#formConnection').css('display','block');
	});
	$('#fermerConnectForm').click(function() {
		$('#formConnection').css('display','none');
	});
	
});

$(document).ready(function() {
	$('#addPost').click(function() {
		$('#addPostModal').css('display','block');
	});
	$('#closeAddPostModal').click(function() {
		$('#addPostModal').css('display','none');
	})
});