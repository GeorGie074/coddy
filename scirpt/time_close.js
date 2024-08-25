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
    saveTimeToDatabase(elapsedTime);
  }
}

function saveTimeToDatabase(time) {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "save_time.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      // หลังจากบันทึกเวลาแล้ว, เปลี่ยนเส้นทางไปยัง test.php
      window.location.href = "./../test.php";
    } else {
      console.error("Failed to save time:", xhr.responseText);
    }
  };
  xhr.send("time=" + time);
}

document.getElementById("openBtn").addEventListener("click", startTimer);
document.getElementById("closeBtn").addEventListener("click", function (event) {
  event.preventDefault(); // ป้องกันไม่ให้ลิงก์ทำงานตามปกติ
  stopTimer();
});
