<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/phosphor-icons/dist/phosphor-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script></head>
<?php
session_start();

if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];

} else {
    header("Location: loginform.php");
    exit();
}
?>

<style>
@import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

:root {
	--c-gray-900: #000000;
	--c-gray-800: #1f1f1f;
	--c-gray-700: #2e2e2e;
	--c-gray-600: #313131;
	--c-gray-500: #969593;
	--c-gray-400: #a6a6a6;
	--c-gray-300: #bdbbb7;
	--c-gray-200: #f1f1f1;
	--c-gray-100: #ffffff;

	--c-green-500: #45ffbc;
	--c-olive-500: #e3ffa8;

	--c-white: var(--c-gray-100);

	--c-text-primary: var(--c-gray-100);
	--c-text-secondary: var(--c-gray-200);
	--c-text-tertiary: var(--c-gray-500);
}
</style>
<style>
body {
	line-height: 1.5;
	min-height: 100vh;
	font-family: "Be Vietnam Pro", sans-serif;
	background-color: white;
    color:white;
	color: var(--c-text-primary);
	display: flex;
	padding-top: 3vw;
	padding-bottom: 3vw;
	justify-content: center;
}

*,
*:before,
*:after {
	box-sizing: border-box;
}

img {
	display: block;
	max-width: 100%;
}

button,
select,
input,
textarea {
	font: inherit;
}

a {
	color: inherit;
}

.responsive-wrapper {
	width: 90%;
	max-width: 1600px;
	margin-left: auto;
	margin-right: auto;
}

.app {
	min-height: 110vh;
	width: 95%;
	max-width: 1600px;
	background-color: var(--c-gray-800);
	padding: 2vw 4vw 6vw;
	display: flex;
	flex-direction: column;
}

.app-header {
	display: grid;
	grid-template-columns: minmax(min-content, 175px) minmax(max-content, 1fr) minmax(
			max-content,
			400px
		);
	column-gap: 4rem;
	align-items: flex-end;
	@media (max-width: 1200px) {
		display: flex;
		align-items: center;
		justify-content: space-between;
		border-bottom: 1px solid var(--c-gray-600);
	}
}

.app-header-navigation {
	@media (max-width: 1200px) {
		display: none;
	}
}

.app-header-actions {
	display: flex;
	align-items: center;
	@media (max-width: 1200px) {
		display: none;
	}
}

.app-header-actions-buttons {
	display: flex;
	border-left: 1px solid var(--c-gray-600);
	margin-left: 2rem;
	padding-left: 2rem;

	& > * + * {
		margin-left: 1rem;
	}
}

.app-header-mobile {
	display: none;
	@media (max-width: 1200px) {
		display: flex;
	}
}

.app-body {
	height: 100%;
	display: grid;
	grid-template-columns: minmax(min-content, 175px) minmax(max-content, 1fr) minmax(
			min-content,
			400px
		);

	column-gap: 4rem;
	padding-top: 2.5rem;

	@media (max-width: 1200px) {
		grid-template-columns: 1fr;
		& > * {
			margin-bottom: 3.5rem;
		}
	}
}

.app-body-navigation {
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	@media (max-width: 1200px) {
		display: none;
	}
}

.footer {
	margin-top: auto;
	h1 {
		font-size: 1.5rem;
		line-height: 1.125;
		display: flex;
		align-items: flex-start;
		small {
			font-size: 0.5em;
			margin-left: 0.25em;
		}
	}

	div {
		border-top: 1px solid var(--c-gray-600);
		margin-top: 1.5rem;
		padding-top: 1rem;
		font-size: 0.75rem;
		color: var(--c-text-tertiary);
	}
}

.logo {
	display: flex;
	align-items: center;
	padding-bottom: 1rem;
	padding-top: 1rem;
	border-bottom: 1px solid var(--c-gray-600);
	@media (max-width: 1200px) {
		border-bottom: 0;
	}
}

.logo-icon {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 32px;
	height: 32px;
}

.logo-title {
	display: flex;
	flex-direction: column;
	line-height: 1.25;
	margin-left: 0.75rem;
	span:first-child {
		color: var(--c-text-primary);
	}
	span:last-child {
		color: var(--c-text-tertiary);
	}
}

.navigation {
	display: flex;
	flex-direction: column;
	align-items: flex-start;
	color: var(--c-text-tertiary);
	a {
		display: flex;
		align-items: center;
		text-decoration: none;
		transition: 0.25s ease;

		* {
			transition: 0.25s ease;
		}

		i {
			margin-right: 0.75rem;
			font-size: 1.25em;
			flex-shrink: 0;
		}

		& + a {
			margin-top: 1.25rem;
		}

		&:hover,
		&:focus {
			transform: translateX(4px);
			color: var(--c-text-primary);
		}
	}
}

.tabs {
	display: flex;
	justify-content: space-between;
	color: var(--c-text-tertiary);
	border-bottom: 1px solid var(--c-gray-600);

	a {
		padding-top: 1rem;
		padding-bottom: 1rem;
		text-decoration: none;
		border-top: 2px solid transparent;
		display: inline-flex;
		transition: 0.25s ease;
		&.active,
		&:hover,
		&:focus {
			color: var(--c-text-primary);
			border-color: var(--c-text-primary);
		}
	}
}

.user-profile {
	display: flex;
	align-items: center;
	border: 0;
	background: transparent;
	cursor: pointer;
	color: var(--c-text-tertiary);
	transition: 0.25s ease;

	&:hover,
	&:focus {
		color: var(--c-text-primary);
		span:last-child {
			box-shadow: 0 0 0 4px var(--c-gray-800), 0 0 0 5px var(--c-text-tertiary);
		}
	}

	span:first-child {
		display: flex;
		font-size: 1.125rem;
		padding-top: 1rem;
		padding-bottom: 1rem;
		border-bottom: 1px solid var(--c-gray-600);
		font-weight: 300;
	}

	span:last-child {
		transition: 0.25s ease;
		display: flex;
		justify-content: center;
		align-items: center;
		width: 42px;
		height: 42px;
		border-radius: 50%;
		overflow: hidden;
		margin-left: 1.5rem;
		flex-shrink: 0;
	}
}

.icon-button {
	width: 32px;
	height: 32px;
	border-radius: 50%;
	border: 0;
	background-color: transparent;
	border: 1px solid var(--c-gray-500);
	color: var(--c-text-primary);
	display: flex;
	align-items: center;
	justify-content: center;
	cursor: pointer;
	transition: 0.25s ease;
	flex-shrink: 0;
	&.large {
		width: 42px;
		height: 42px;
		font-size: 1.25em;
	}

	i {
		transition: 0.25s ease;
	}

	&:hover,
	&:focus {
		background-color: var(--c-gray-600);
		box-shadow: 0 0 0 4px var(--c-gray-800), 0 0 0 5px var(--c-text-tertiary);
	}
}

.tiles {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	column-gap: 1rem;
	row-gap: 1rem;
	margin-top: 1.25rem;
	@media (max-width: 700px) {
		grid-template-columns: repeat(1, 1fr);
	}
}

.tile {
	padding: 1rem;
	border-radius: 8px;
	background-color: var(--c-olive-500);
	color: var(--c-gray-900);
	min-height: 200px;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	position: relative;
	transition: 0.25s ease;

	&:hover {
		transform: translateY(-5px);
	}

	&:focus-within {
		box-shadow: 0 0 0 2px var(--c-gray-800), 0 0 0 4px var(--c-olive-500);
	}

	&:nth-child(2) {
		background-color: var(--c-green-500);
		&:focus-within {
			box-shadow: 0 0 0 2px var(--c-gray-800), 0 0 0 4px var(--c-green-500);
		}
	}
	&:nth-child(3) {
		background-color: var(--c-gray-300);
		&:focus-within {
			box-shadow: 0 0 0 2px var(--c-gray-800), 0 0 0 4px var(--c-gray-300);
		}
	}

	a {
		text-decoration: none;
		display: flex;
		align-items: center;
		justify-content: space-between;
		font-weight: 600;

		.icon-button {
			color: inherit;
			border-color: inherit;
			&:hover,
			&:focus {
				background-color: transparent;
				i {
					transform: none;
				}
			}
		}

		&:focus {
			box-shadow: none;
		}

		&:after {
			content: "";
			display: block;
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
		}
	}
}

.tile-header {
	display: flex;
	align-items: center;
	i {
		font-size: 2.5em;
	}

	h3 {
		display: flex;
		flex-direction: column;
		line-height: 1.375;
		margin-left: 0.5rem;
		span:first-child {
			font-weight: 600;
		}

		span:last-child {
			font-size: 0.825em;
			font-weight: 200;
		}
	}
}
.service-section {
    position:absolute;
    top:45%;
    left:22%;
    width:40%;
    max-height:70%;
    overflow: scroll;
	resize: horizontal; 
    overflow: auto; 
    min-width: 20%;
    max-width: 80%;
}
.service-section::after {
    content: "";
    display: block;
    position: absolute;
    bottom: 0;
    right: 0;
    width: 10px;
    height: 10px;
    background-color: #ccc;
    cursor: ew-resize;
}
body.scrolled .service-section {
    background-color: transparent; 
}
.service-section {
	& > h2 {
		font-size: 1.5rem;
		margin-bottom: 1.25rem;
	}
}

.service-section-header {
	display: flex;
	align-items: center;
	justify-content: space-between;
	& > * + * {
		margin-left: 1.25rem;
	}

	@media (max-width: 1000px) {
		display: none;
	}
}

.service-section-footer {
	color: var(--c-text-tertiary);
	margin-top: 1rem;
}

.search-field {
	display: flex;
	flex-grow: 1;
	position: relative;
	input {
		width: 100%;
		padding-top: 0.5rem;
		padding-bottom: 0.5rem;
		border: 0;
		border-bottom: 1px solid var(--c-gray-600);
		background-color: transparent;
		padding-left: 1.5rem;
	}

	i {
		position: absolute;
		left: 0;
		top: 50%;
		transform: translateY(-50%);
	}
}

.dropdown-field {
	display: flex;
	flex-grow: 1;
	position: relative;
	select {
		width: 100%;
		padding-top: 0.5rem;
		padding-bottom: 0.5rem;
		border: 0;
		border-bottom: 1px solid var(--c-gray-600);
		background-color: transparent;
		padding-right: 1.5rem;
		appearance: none;
		color: var(--c-text-tertiary);
		width: 100%;
	}

	i {
		position: absolute;
		right: 0;
		top: 50%;
		transform: translateY(-50%);
	}
}

.flat-button {
	border-radius: 6px;
	background-color: var(--c-gray-700);
	padding: 0.5em 1.5em;
	border: 0;
	color: var(--c-text-secondary);
	transition: 0.25s ease;
	cursor: pointer;
	&:hover,
	&:focus {
		background-color: var(--c-gray-600);
	}
}

.mobile-only {
	display: none;
	@media (max-width: 1000px) {
		display: inline-flex;
	}
}

.transfer-section {
	margin-top: 2.5rem;
}

.transfer-section-header {
	display: flex;
	align-items: center;
	width: 100%;
	padding-bottom: 0.75rem;
	border-bottom: 1px solid var(--c-gray-600);
	h2 {
		font-size: 1.5rem;
	}
}

.payments {
	display: flex;
	flex-direction: column;
	margin-top: 1.5rem;
}

.payment {
	display: flex;
	align-items: center;
	& + * {
		margin-top: 1rem;
	}
}

.card {
	width: 125px;
	padding: 0.375rem;
	aspect-ratio: 3 / 2;
	flex-shrink: 0;
	border-radius: 6px;
	color: var(--c-gray-800);
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	font-size: 0.75rem;
	font-weight: 600;
	&.green {
		background-color: var(--c-green-500);
	}

	&.olive {
		background-color: var(--c-olive-500);
	}

	&.gray {
		background-color: var(--c-gray-300);
	}

	span:last-child {
		align-self: flex-end;
	}
}

.payment-details {
	display: flex;
	width: 100%;
	flex-direction: column;
	margin-left: 1.5rem;
	h3 {
		font-size: 1rem;
		color: var(--c-text-tertiary);
	}

	div {
		margin-top: 0.75rem;
		padding-top: 0.75rem;
		padding-bottom: 0.75rem;
		border-top: 1px solid var(--c-gray-600);
		border-bottom: 1px solid var(--c-gray-600);
		display: flex;
		align-items: center;
		justify-content: space-between;
		flex: 1;

		span {
			font-size: 1.5rem;
		}
	}
}
.payment-section select {
    background-color: transparent;
    border:none;
    outline:none;
    color:white;
}
.payment-section input {
    color:white;
}
select option{
    color:black;
}
.filter-options {
	margin-left: 1.25rem;
	padding-left: 1.25rem;
	border-left: 1px solid var(--c-gray-600);
	display: flex;
	align-items: center;
	flex: 1 1 auto;

	p {
		& + * {
			margin-left: auto;
			margin-right: 0.75rem;
		}
		color: var(--c-text-tertiary);
		font-size: 0.875rem;
		@media (max-width: 1000px) {
			display: none;
		}
	}
}

.transfers {
	display: flex;
	flex-direction: column;
	margin-top: 1.5rem;
}

.transfer {
	display: flex;
	align-items: center;
	width: 100%;
	font-size: 0.875rem;
	@media (max-width: 1000px) {
		align-items: flex-start;
		flex-direction: column;
	}
	& + * {
		margin-top: 2rem;
	}
}

.transfer-logo {
	background-color: var(--c-gray-200);
	border-radius: 4px;
	width: 42px;
	height: 42px;
	display: flex;
	align-items: center;
	justify-content: center;
	img {
		width: 45%;
	}
}

.transfer-details {
	margin-left: 2rem;
	display: flex;
	align-items: center;
	justify-content: space-between;
	flex: 1;
	@media (max-width: 1000px) {
		flex-wrap: wrap;
		margin-left: 0;
		margin-top: 1rem;
	}
	div {
		width: calc(100% / 3 - 1rem);
		@media (max-width: 1000px) {
			width: 100%;
		}
		& + div {
			margin-left: 1rem;
			@media (max-width: 1000px) {
				margin-left: 0;
				margin-top: 1rem;
			}
		}
	}

	dd {
		color: var(--c-text-tertiary);
		margin-top: 2px;
	}
}

.transfer-number {
	margin-left: 2rem;
	font-size: 1.125rem;
	flex-shrink: 0;
	width: 15%;
	display: flex;
	justify-content: flex-end;
	@media (max-width: 1000px) {
		margin-left: 0;
		margin-top: 1.25rem;
		width: 100%;
		justify-content: flex-start;
	}
}
.payment-section{
    position: absolute;
    top:35%;
    right: 5%;
    width:30%;
}
.payment-section {
	& > h2 {
		font-size: 1.5rem;
	}
}

.payment-section-header {
	display: flex;
	align-items: center;
	margin-top: 1rem;
	p {
		color: var(--c-text-tertiary);
		font-size: 0.875rem;
	}

	div {
		padding-left: 1rem;
		margin-left: auto;
		display: flex;
		align-items: center;
		& > * + * {
			margin-left: 0.5rem;
		}
	}
}

.card-button {
	display: flex;
	width: 50px;
	height: 34px;
	align-items: center;
	justify-content: center;
	overflow: hidden;
	background-color: transparent;
	transition: 0.25s ease;
	border-radius: 4px;
	border: 2px solid var(--c-gray-600);
	color: var(--c-text-primary);
	cursor: pointer;
	&.mastercard svg {
		max-height: 15px;
	}

	&:focus,
	&:hover,
	&.active {
		color: var(--c-gray-800);
		background-color: var(--c-white);
		border-color: var(--c-white);
	}
}

.faq {
	margin-top: 1.5rem;
	display: flex;
	flex-direction: column;
	p {
		color: var(--c-text-tertiary);
		font-size: 0.875rem;
	}

	div {
		margin-top: 0.75rem;
		padding-top: 0.75rem;
		padding-bottom: 0.75rem;
		border-top: 1px solid var(--c-gray-600);
		border-bottom: 1px solid var(--c-gray-600);
		font-size: 0.875rem;
		display: flex;
		align-items: center;

		label {
			padding-right: 1rem;
			margin-right: 1rem;
			border-right: 1px solid var(--c-gray-600);
		}

		input {
			border: 0;
			background-color: transparent;
			padding: 0.25em 0;
			width: 100%;
		}
	}
}

.payment-section-footer {
	display: flex;
	align-items: center;
	margin-top: 1.5rem;
}
button [type=button]
{
    margin-left: 30px;
}
.save-button {
	border: 1px solid currentColor;
	color: var(--c-text-tertiary);
	border-radius: 6px;
	padding: 0.75em 2.5em;
	background-color: transparent;
	transition: 0.25s ease;
	cursor: pointer;
	&:focus,
	&:hover {
		color: var(--c-white);
	}
}

.settings-button {
	display: flex;
	align-items: center;
	color: var(--c-text-tertiary);
	background-color: transparent;
	border: 0;
	padding: 0;
	margin-left: 1.5rem;
	cursor: pointer;
	transition: 0.25s ease;
	i {
		margin-right: 0.5rem;
	}
	&:focus,
	&:hover {
		color: var(--c-white);
	}
}

input,
select,
a,
textarea,
button {
	&:focus {
		outline: 0;
		box-shadow: 0 0 0 2px var(--c-gray-800), 0 0 0 4px var(--c-gray-300);
	}
}      .questionform p.subq {
            font-weight: bold;
        }
        textarea , select{
    width: 8%;
    height: 50px;
    padding: 3px;
    border: 1px solid #dddddd;
    border-radius: 3px;
}
        .answer-option {
    display: inline-flex;
    align-items: center;
    margin-right: 10px;
}

.answer-option input[type="checkbox"],
.answer-option input[type="radio"] {
    margin-right: 5px;
}
        .programming-textarea,
        textarea,select {
            width: 80%;
            height: 60px;
            padding: 3px;
            border: 1px solid #dddddd;
            border-radius: 3px;
        }

        .edit-button,
        .delete-button {
            background-color: transparent;
            border: none;
            color: #555555;
            font-size: 14px;
            cursor: pointer;
        }

        .edit-button:hover,
        .delete-button:hover {
            color: #000000;
        }

        button[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4caf50;
            border: none;
            color: #ffffff;
            font-size: 16px;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
  width: 16%;
}
.overlay {
  height: 0%;
  width: 100%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-y: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 10%;
  left:40%;
  width: 30%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay {overflow-y: auto;}
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}
.card {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 350px;
      padding: 20px;
      border-radius: 10px;
      background-color: #f1f1f1;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      font-family: Arial, sans-serif;
    }

    .profile-image {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 10px;
    }

    .names {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .options {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 20px;
    }

    .option {
      margin-bottom: 10px;
      width: 100%;
    }

</style>
<script>
const solutionSelect = document.querySelector('select[name="solution"]');
const formContainer = document.querySelector('.faq');

function toggleAdditionalForm() {
  const selectedSolution = solutionSelect.value;
  const additionalForm = document.querySelector('.additional-form');
  
  if (selectedSolution === 'choice' || selectedSolution === 'checkbox' || selectedSolution === 'selects') {
    additionalForm.style.display = 'block';
  } else {
    additionalForm.style.display = 'none';
  }
}

solutionSelect.addEventListener('change', toggleAdditionalForm);
toggleAdditionalForm();
</script>
<div class="app">

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  <div class="card">
    <img class="profile-image" src="profile-photo.jpg" alt="Profile Photo">
    <div class="names"><?php echo $lastname." "?> <?php echo $firstname." "?></div>
    <div class="names">Instructor</div>
    <div class="options">
	<button class="option btn btn-outline-primary btn-block">Reset Password</button>
      <button class="option btn btn-outline-danger btn-block">Delete Account</button>
      <button class="option btn btn-outline-secondary btn-block">Edit Names</button>
      <button class="option btn btn-outline-dark btn-block" id="logoutButton">Log Out</button>
    </div>
  </div>
  </div>
</div>
<script>

    var logoutButton = document.getElementById('logoutButton');
    logoutButton.addEventListener('click', function() {
    
        window.location.href = 'Home.php';
    });
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>
	<header class="app-header">
		<div class="app-header-logo">
			<div class="logo">
				<span class="logo-icon">
					
				</span>
				<h1 class="logo-title">
					<span>Exam</span>
					<span>Platform</span>
				</h1>
			</div>
		</div>
		<div class="app-header-navigation">
			<div class="tabs">
				<a href="#">
				  category
				</a>
				<a href="#" class="active">
					Solutions
				</a>
				<a href="#" onclick="loadMarksData(); return false;">
					Marks
				</a>
				<a href="chart.php" onclick="loadChartData(); ">
					Performance
				</a>
				<a href="#">
					Security
				</a>
				<a href="#" onclick="loadPublishMarks(); return false">
					Publish
				</a>
			</div>
		</div>
		<div class="app-header-actions">
			<button class="user-profile">
				<span><?php echo $firstname." "?><?php echo $lastname ?></span>
				<span>
					<img src="userimage.png" />
				</span>
			</button>
			<div class="app-header-actions-buttons">
				<button class="icon-button large">
					<i class="ph-magnifying-glass"></i>
				</button>
				<button class="icon-button large">
					<i class="ph-bell"></i>
				</button>
			</div>
		</div>
		<div class="app-header-mobile">
			<button class="icon-button large">
				<i class="ph-list"></i>
			</button>
		</div>

	</header>
	<div class="app-body">
		<div class="app-body-navigation">
			<nav class="navigation">
				<a href="#" onclick="loadQuestionsData(); return false;">
					<i class="ph-browsers"></i>
					<span>Questions</span>
				</a>
				<a href="#" onclick="openNav()">
				<i class="ph-swap"></i>
                 <span>Accounts</span>
</a>
				<a href="#" onclick="loadTableData(); return false;">
					<i class="ph-swap"></i>
					<span>Database</span>
				</a>
                <script>
function loadTableData() {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState === 4 && xhr.status === 200) {
			document.getElementById("service-section").innerHTML = xhr.responseText;
		}
	};
	xhr.open("GET", "try.php", true);
	xhr.send();
}

function loadMarksData() {
    var examKey = prompt("Enter Exam Key:");
    if (examKey) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("service-section").innerHTML = xhr.responseText;
            }
        };
        xhr.open("POST", "solution.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("examKey=" + encodeURIComponent(examKey));
    }
}
function loadPublishMarks()
{
	var examKey = prompt("Enter Exam Key:");
    if (examKey) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("service-section").innerHTML = xhr.responseText;
            }
        };
        xhr.open("POST", "PublishMarks.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("examKey=" + encodeURIComponent(examKey));
    }
}

function loadQuestionsData() {
    var examKey = prompt("Enter Exam Key:");
    if (examKey) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("service-section").innerHTML = xhr.responseText;
            }
        };
        xhr.open("POST", "Questions.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("examKey=" + encodeURIComponent(examKey));
    }
}

function fetchExamResults() {
    var examKey = prompt("Enter the exam key:");

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById('examResults').innerHTML = xhr.responseText;
      }
    };
    xhr.open("GET", "try.php?exam_key=" + encodeURIComponent(examKey), true);
    xhr.send();
  }
  function fetchPerformanceResults() {
    var examKey = prompt("Enter the exam key:");

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById('examResults').innerHTML = xhr.responseText;
      }
    };
    xhr.open("GET", "chart.php?exam_key=" + encodeURIComponent(examKey), true);
    xhr.send();
  }
function loadChartData() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("app-body-main-content").innerHTML = xhr.responseText;


        }
    };
    xhr.open("GET", "chart.php", true);
    xhr.send();
}
function loadExamKeyData() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("service-section").innerHTML = xhr.responseText;


        }
    };
    xhr.open("GET", "ExamKey.php", true);
    xhr.send();
}
  function addMarks(id) {
    var newMarks = prompt("Enter the new marks:");

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        fetchExamResults();
      }
    };
    xhr.open("POST", "update_marks.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + encodeURIComponent(id) + "&newMarks=" + encodeURIComponent(newMarks));
  }
  function deleteMarks(id) {
    var confirmDelete = confirm("Are you sure you want to delete this row?");
    
    if (confirmDelete) {
        var name = prompt("Enter the name:");
        var examKey = prompt("Enter the exam key:");
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                fetchExamResults();
            }
        };
        xhr.open("POST", "delete_row.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + encodeURIComponent(id) + "&name=" + encodeURIComponent(name) + "&examKey=" + encodeURIComponent(examKey));
    }
}
</script>
				<a href="#">
					<i class="ph-file-text"></i>
					<span>Premium</span>
				</a>
				<a href="#" onclick="loadExamKeyData(); return true;">
					<i class="ph-clipboard-text"></i>
					<span>Exams Key</span>
				</a>
			</nav>
			<footer class="footer">
				<h1>Instructor<small>©</small></h1>
				<div>
					<?php echo $lastname?><br />
					Create exam in easy mode
				</div>
			</footer>
		</div>
		<div class="app-body-main-content" id="app-body-main-content">
			<section class="service-section" id="service-section">
				<h2>PREVIEW</h2>
                <?php
                include('Connection.php');
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
$sqlQuestions = "SELECT distinct id,question,solution,exam_key,choice1,choice2,choice3,choice4,fullname,lastname FROM questions where fullname='$firstname' and lastname='$lastname'";
$resultQuestions = $conn->query($sqlQuestions);

if ($resultQuestions->num_rows > 0) {
echo "<br>";
   echo "<form class='preview-sub' method='post' action=''>";
   $index=1;
    while ($row = $resultQuestions->fetch_assoc()) {
        echo '<div class="questionform">';
        echo "<p class='subq'>{$index}: {$row['question']}</p>";
        echo "<button type='button' class='edit-button' data-question-id='{$row['id']}'>Edit</button>";
        echo "<button type='button' class='delete-button' data-question-id='{$row['id']}'>Delete</button><br>";
        if ($row['solution'] === 'choice') {
            $choices = array_filter([$row['choice1'], $row['choice2'], $row['choice3'], $row['choice4']]);
            if (!empty($choices)) {
                foreach ($choices as $choice) {
                    echo "<label class='answer-option'><input type='radio' name='userOpt[]' value='{$choice}'>{$choice}</label>";
                    echo "<br>";
                }
            }
        } elseif ($row['solution'] === 'checkbox') {
            $choices = array_filter([$row['choice1'], $row['choice2'], $row['choice3'], $row['choice4']]);
            if (!empty($choices)) {
                foreach ($choices as $choice) {
                    echo "<label class='answer-option'><input type='checkbox' name='userCheck[]' value='{$choice}'>{$choice}</label>";
                    echo "<br>";
                }
            }
        } elseif ($row['solution'] === 'Selects') {
            $choices = array_filter([$row['choice1'], $row['choice2'], $row['choice3'], $row['choice4']]);
            if (!empty($choices)) {
                echo "<select class='answer-option' name='userchoice2'>";
                foreach ($choices as $choice) {
                    echo "<option value='{$choice}'>{$choice}</option>";
                }
                echo "</select>";
            }
            
        }
        elseif ($row['solution'] === 'Choose') {
            $choices = array_filter([$row['choice1'], $row['choice2'], $row['choice3'], $row['choice4']]);
            if (!empty($choices)) {
                foreach ($choices as $choice) {
                    echo "<button type='button' value='{$choice}'>{$choice}</button>";
                }
            }}
        
        elseif ($row['solution'] === 'Programming') {
            echo "<textarea class='programming-textarea' name='programming_solution' placeholder='Write your program'></textarea>";
         } elseif ($row['solution'] === 'audio') {
            echo "<input type='file' class='audio-input' name='audio_solution' accept='audio/*'/>";
        } elseif ($row['solution'] === 'video') {
            echo "<input type='file' class='video-input' name='video_solution' accept='video/*'/>";
        }
        elseif ($row['solution']==='Pragaraph') {
            echo "<textarea></textarea>";
    }
    $index++;
        echo '</div>';
    }
} else {
    echo "No questions found.";
    }
    echo "<button type='submit' disabled>Submit Exam</button>";
    echo "</form>";

$conn->close();
?>
            </section>
		<div class="app-body-sidebar">
			<section class="payment-section">
				
				<div class="faq">
                    <form method="POST">
					<p>Add your questions here</p>
					<div>
						<label>Question</label>
						<input type="text" name="newQuestion" placeholder="Type here">
					</div>
                    <div>
						<label>Solution type</label>
						<select name="solution">
                            <option value="Pragaraph">Pragaraph</option>
                            <option value="choice">Multiple choice</option>
                            <option value="checkbox">More than two optional solution</option>
                            <option value="Programming">Programming</option>
                            <option value="Selects">Selects</option>
                            <option value="Choose">Choose</option>
                            <option value="Audio">Audio Recording</option>
                            <option value="Video">Screen recording</option>
                        </select>
					</div>
                    <p>Exam Requirement</p>
					<div>
						<label>Key</label>
						<input type="text" name="ExamKey" placeholder="Enter exam key" minlength="6">
                        <input type="number" name="Minutes" placeholder="Enter question Minute">
					</div>
                    <div>
						<label>Choices</label>
						<input type="text" name="choice1" placeholder=" One">
                        <input type="text" name="choice2" placeholder=" Two">
                        <input type="text" name="choice3" placeholder="Three">
                        <input type="text" name="choice4" placeholder="Four">
					</div>
				</div>
				<div class="payment-section-footer">
					<button class="save-button" type="submit">
						Save
					</button>
                    </form>
					<button class="settings-button">
						<i class="ph-gear"></i>
						<span>More settings</span>
					</button>
				</div>
               
			</section>
		</div>
	</div>
</div>
<?php

include('Connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $newQuestion = $_POST['newQuestion'];
    $solution = $_POST['solution'];
    $examKey = $_POST['ExamKey'];
    $minutes = $_POST['Minutes'];
    $choice1 = $_POST['choice1'];
    $choice2 = $_POST['choice2'];
    $choice3 = $_POST['choice3'];
    $choice4 = $_POST['choice4'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    
    $query = "INSERT INTO questions (question, solution, exam_key, minutes, choice1, choice2, choice3, choice4,fullname,lastname) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?)";
    $statement = $conn->prepare($query);
    $statement->bind_param('ssssssssss', $newQuestion, $solution, $examKey, $minutes, $choice1, $choice2, $choice3, $choice4,$firstname,$lastname);
    $statement->execute();

    
    if ($statement->affected_rows > 0) {
		exit();
    } else {
    }

    $statement->close();
    $conn->close();
}
?>
