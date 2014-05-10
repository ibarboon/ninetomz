			<hr>
			<footer>2013 &copy; nine-tom studio</footer>
		</div>
		<script type="text/javascript">
			$(function(){
				var currentUrl = document.URL;
				$("input, textarea").attr("disabled","disabled");
				$("#edit-button, #launch-album-modal, #add-photo-button, #edit-photo-description").on("click",function(){
					$("#cancel-to-edit").show();
					$("input, textarea").removeAttr("disabled");
				});
				$("#cancel-to-edit").on("click",function(){
					$(this).hide();
					$("input, textarea").attr("disabled","disabled");
				});
				/*
				$("[name=user-form]").on("submit",function(){
					var validation = true;
					$("[name=user-form] input").each(function(){
						if($(this).val() === "" || $(this).val() === null){
							validation = false;
						}
					});
					if($("[name=new-password]").val() !== $("[name=re-type-new-password]").val()){
						alert("New password does not match the re-type new password !");
						$("[type=password]").val(null);
						validation = false;
					}
					return validation;
				});
				*/

				$(".get-photo-modal").on("click", function() {
					$("#photo-modal .col-xs-7").empty();
					$(this).find("img").clone().appendTo("#photo-modal .col-xs-7");
					$("#photo-modal .col-xs-7").find("img").attr("style", "width: 100%");
					var photoName = $(this).attr("data-photo-name"),
						photoDescription = $(this).attr("data-photo-description"),
						photoRowId = $(this).attr("data-photo-row-id");
					$("#input-photo-description").text(photoDescription);
					//DELETE PHOTO
					$("#do-delete-photo").attr("href", $("#do-delete-photo").attr("data-href") + '/' + photoRowId);
					//EDIT PHOTO DESCRIPTION
					$("#edit-photo-description-form").attr("action", currentUrl + '/' + photoRowId);
					//MAKE THIS PHOTO TO CAROUSEL INTRO
					$("#do-carousel-intro").attr("href", $("#do-carousel-intro").attr("data-href") + '/' + photoRowId);
					//MAKE THIS PHOTO TO CAROUSEL CONTENT
					$("#do-carousel-content").attr("href", $("#do-carousel-content").attr("data-href") + '/' + photoRowId);
					//MAKE THIS PHOTO TO ALBUM COVER
					$("#do-album-cover").attr("href", $("#do-album-cover").attr("data-href") + '/' + photoRowId);
				});

				$('#do-add-another-email').on('click', function(){
					//$('#in-mail-us').clone().insertBefore(this);
				});
			});
		</script>
	</body>
</html>