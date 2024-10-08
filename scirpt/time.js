function updateTime() {
  const clockElement = document.getElementById("clock");
  const now = new Date();
  const hours = now.getHours().toString().padStart(2, "0");
  const minutes = now.getMinutes().toString().padStart(2, "0");
  const seconds = now.getSeconds().toString().padStart(2, "0");
  clockElement.textContent = `${hours}:${minutes}:${seconds}`;
}

setInterval(updateTime, 1000); // อัปเดตทุก 1 วินาที
updateTime(); // เรียกใช้เพื่อแสดงเวลาในตอนแรกที่โหลดหน้า
