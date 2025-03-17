<footer class="text-center card-footer p-5">
    <p id="datetime"></p>
</footer>

<script>
    function updateDateTime() {
        const now = new Date();
        const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        const day = days[now.getDay()];
        const date = now.getDate();
        const month = months[now.getMonth()];
        const year = now.getFullYear();

        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');

        const formattedDateTime = `${day}, ${date} ${month} ${year} - ${hours}:${minutes}:${seconds} WIB`;

        const datetimeElement = document.getElementById('datetime');
        if (datetimeElement) {
            datetimeElement.innerHTML = formattedDateTime;
        }

        // Gunakan requestAnimationFrame untuk sinkronisasi waktu dengan refresh rate layar
        requestAnimationFrame(updateDateTime);
    }

    document.addEventListener("DOMContentLoaded", updateDateTime);
</script>
