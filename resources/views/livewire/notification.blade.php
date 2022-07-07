<div>
	<button wire:click="notification">Notify</button>
	<script>
		window.addEventListener('notify', event => {
			Notification.requestPermission().then(function (permission) {
				var title = event.detail.title ;
				var icon = 'https://homepages.cae.wisc.edu/~ece533/images/airplane.png';
				var body = event.detail.text;
				var notification = new Notification(title, { body, icon });
				notification.close();
			});
		});
	</script>
</div>
