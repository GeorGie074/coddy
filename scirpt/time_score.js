let intervalId;
let elapsedTime = 0;

function updateTime() {
  elapsedTime += 1;
  const hours = Math.floor(elapsedTime / 3600)
    .toString()
    .padStart(2, "0");
  const minutes = Math.floor((elapsedTime % 3600) / 60)
    .toString()
    .padStart(2, "0");
  const seconds = (elapsedTime % 60).toString().padStart(2, "0");
  document.getElementById(
    "timer"
  ).textContent = `${hours}:${minutes}:${seconds}`;
}

function startTimer() {
  if (!intervalId) {
    intervalId = setInterval(updateTime, 1000);
  }
}

function stopTimer() {
  if (intervalId) {
    clearInterval(intervalId);
    intervalId = null;
    saveTimeToDatabase(elapsedTime); // ส่งข้อมูลไปยังเซิร์ฟเวอร์เมื่อหยุด
  }
}

function saveTimeToDatabase(time) {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "save_time.php", true); // URL ของสคริปต์ฝั่งเซิร์ฟเวอร์
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("time=" + time);
}

// เริ่มการนับเวลาทันทีเมื่อเปิดหน้าเว็บ
window.onload = startTimer;

// หยุดการนับเวลาเมื่อออกจากหน้าเว็บ
window.onbeforeunload = stopTimer;