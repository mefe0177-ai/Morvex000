<?php require '../config/security.php'; ?>
<form id="loginForm" class="card">
<input name="email" type="email" placeholder="Email" required>
<input name="password" type="password" placeholder="Şifre" required>
<input type="hidden" name="csrf" value="<?=csrf_token()?>">
<button>Giriş</button></form>
<script>
document.getElementById('loginForm').onsubmit=async e=>{
 e.preventDefault();
 const res=await fetch('ajax-login.php',{method:'POST',body:JSON.stringify(Object.fromEntries(new FormData(e.target)))});
 const j=await res.json();
 if(j.status==='ok') location.href='../dashboard.php'; else alert('Hatalı giriş');
};
</script>