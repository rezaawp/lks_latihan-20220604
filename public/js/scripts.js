const waktu = document.getElementById('waktu').value + "." + 0;
const waktu_terpakai = document.getElementById('waktu_terpakai').value;
const timer = document.getElementById('timer');
const soal = document.getElementById('soal');

let sisa_waktu = waktu - waktu_terpakai;
let time = sisa_waktu * 60;

console.log(time);

let countDown = setInterval(function() {
	const menit = Math.floor(time / 60);
	let detik = Math.floor(time % 60);

	// console.log(menit);
	// menit = menit < 10 ? '0' + menit : menit;
	// if (menit < 10) {
	// 	menit = `0${menit}`;
	// }
	detik = detik < 10 ? '0' + detik : detik;
	timer.innerHTML = `${menit} Menit ${detik} Detik`;
	time--;
	if(menit < 0 )
	{
		clearInterval(countDown);
		soal.style.display = "none";
		return timer.innerHTML = 'Waktu Habis !';
	}
}, 1000);