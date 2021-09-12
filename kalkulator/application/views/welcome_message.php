<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<p><?= $this->session->flashdata("pesan") ?>
	</p>
	<table>
		<form action="<?= base_url('welcome/insert') ?>
		" method="post">
			<tr>
				<td>input a</td>
				<td><input type="text" id="inputA" name="inputA"></td>
			</tr>

			<tr>
				<td>input b</td>
				<td><input type="text" id="inputB" name="inputB"></td>
			</tr>
			<tr>
				<td>Hasil</td>
				<td>
					<input type="text" id="hasil" readonly name="hasil">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<table>
						<tr>
							<td><button id="tambah">+</button></td>
							<td><button id="kali">x</button></td>
							<td><button id="kurang">-</button></td>
							<td><button id="bagi">/</button></td>
							<td><button id="modulus">%</button></td>
						</tr>
					</table>
				</td>
			</tr>
		</form>
	</table>
	<script src="<?= base_url('assets') ?>/js/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#tambah").click(function() {
				let a = $("#inputA").val();
				let b = $("#inputB").val();
				let hasil = $("#hasil");
				if (a == "" || b == "") {
					alert("Input A dan Input B tidak boleh kosong");
				} else {
					let result = Number(a) + Number(b);
					hasil.val(result);
					$.ajax({
						type: "POST",
						url: "<?= base_url('welcome/insert') ?>",
						data: {
							'inputA': a,
							'inputB': b,
							'hasil': result,
						},
						success: function(e) {
							alert("berhasil input");
						}
					})
				}
			});
			$("#kali").click(function() {
				let a = $("#inputA").val();
				let b = $("#inputB").val();
				let hasil = $("#hasil");

				if (a == "" || b == "") {
					alert("Input A dan Input B tidak boleh kosong");
				} else {
					let result = Number(a) * Number(b);
					hasil.val(result);
				}
			});
			$("#bagi").click(function() {
				let a = $("#inputA").val();
				let b = $("#inputB").val();
				let hasil = $("#hasil");
				if (a == "" || b == "") {
					alert("Input A dan Input B tidak boleh kosong");
				} else {
					let result = Number(a) / Number(b);
					hasil.val(result);
				}
			});
			$("#kurang").click(function() {
				let a = $("#inputA").val();
				let b = $("#inputB").val();
				let hasil = $("#hasil");
				if (a == "" || b == "") {
					alert("Input A dan Input B tidak boleh kosong");
				} else {
					let result = Number(a) - Number(b);
					hasil.val(result);
				}
			});
			$("#modulus").click(function() {
				let a = $("#inputA").val();
				let b = $("#inputB").val();
				let hasil = $("#hasil");
				if (a == "" || b == "") {
					alert("Input A dan Input B tidak boleh kosong");
				} else {
					let result = Number(a) % Number(b);
					hasil.val(result);
				}
			});
		})
	</script>

</body>

</html>