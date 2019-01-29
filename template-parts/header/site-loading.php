<style type="text/css">
		.tp-progress-indicator.available {
			opacity: 0;
		}

		.tp-progress-indicator {
			background-color: #4B5FF7;
			width: 100%;
			height: 100%;
			position: fixed;
			opacity: 1;
			pointer-events: none;
			-webkit-transition: opacity cubic-bezier(.4, 0, .2, 1) 436ms;
			-moz-transition: opacity cubic-bezier(.4, 0, .2, 1) 436ms;
			transition: opacity cubic-bezier(.4, 0, .2, 1) 436ms;
			z-index: 9999;
		}

		.insp-logo-frame {
			display: -webkit-flex;
			display: -moz-flex;
			display: flex;
			-webkit-flex-direction: column;
			-moz-flex-direction: column;
			flex-direction: column;
			-webkit-justify-content: center;
			-moz-justify-content: center;
			justify-content: center;
			-webkit-animation: fadein 436ms;
			-moz-animation: fadein 436ms;
			animation: fadein 436ms;
			height: 98%;

			position: absolute;
			top: 50%;
			left: 50%;
			-webkit-transform: translate(-50%, -50%);
			-moz-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			-o-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
		}

		.insp-logo-frame-img {
			-webkit-align-self: center;
			-moz-align-self: center;
			align-self: center;
		}

		.tp-progress-indicator-head {
			background-color: #fff;
			height: 4px;
			overflow: hidden;
			position: relative;
		}

		.tp-progress-indicator .first-indicator,
		.tp-progress-indicator .second-indicator {
			background-color: rgba(250, 255, 0, .8);
			bottom: 0;
			left: 0;
			right: 0;
			top: 0;
			position: absolute;
			-webkit-transform-origin: left center;
			-moz-transform-origin: left center;
			transform-origin: left center;
			-webkit-transform: scaleX(0);
			-moz-transform: scaleX(0);
			transform: scaleX(0);
		}

		.tp-progress-indicator .first-indicator {
			-webkit-animation: first-indicator 2000ms linear infinite;
			-moz-animation: first-indicator 2000ms linear infinite;
			animation: first-indicator 2000ms linear infinite;
		}

		.tp-progress-indicator .second-indicator {
			-webkit-animation: second-indicator 2000ms linear infinite;
			-moz-animation: second-indicator 2000ms linear infinite;
			animation: second-indicator 2000ms linear infinite;
		}

		.tp-progress-indicator .insp-logo {
			animation: App-logo-spin infinite 20s linear;
			border-radius: 50%;
			-webkit-align-self: center;
			-moz-align-self: center;
			align-self: center;
		}

		@keyframes App-logo-spin {
			from {
				transform: rotate(0deg);
			}

			to {
				transform: rotate(360deg);
			}
		}

		@-webkit-keyframes fadein {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}

			;
		}

		@-moz-keyframes fadein {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}

			;
		}

		@keyframes fadein {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}

			;
		}

		@keyframes first-indicator {
			0% {
				transform: translate(0%) scaleX(0);
			}

			25% {
				transform: translate(0%) scaleX(0.5);
			}

			50% {
				transform: translate(25%) scaleX(0.75);
			}

			75% {
				transform: translate(100%) scaleX(0);
			}

			100% {
				transform: translate(100%) scaleX(0);
			}

			;
		}

		@keyframes second-indicator {
			0% {
				transform: translate(0%) scaleX(0);
			}

			60% {
				transform: translate(0%) scaleX(0);
			}

			80% {
				transform: translate(0%) scaleX(0.6);
			}

			100% {
				transform: translate(100%) scaleX(0.1);
			}

			;
		}
	</style>
<div class="tp-progress-indicator" id="tp-progress-indicator">
		<div class="tp-progress-indicator-head">
			<div class="first-indicator"></div>
			<div class="second-indicator"></div>
		</div>
		<div class="insp-logo-frame">
			<img style="max-width: 165px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/transformation-space-logo.gif"
			 alt="logo">
		</div>
	</div>