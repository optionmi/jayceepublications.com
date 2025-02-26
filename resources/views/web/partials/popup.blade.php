    <!-- Modal -->
    <div id="popup-modal" class="flex fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-50">
        <div class="relative p-4 w-96 bg-white rounded-lg shadow-lg">
            <button id="close-modal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">&times;</button>
            <div class="flex justify-center w-full">
                <img src="{{ asset('pop-up/img.jpeg') }}" alt="Popup Image" class="w-full rounded-lg">
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("popup-modal");
            const closeModal = document.getElementById("close-modal");

            closeModal.addEventListener("click", function() {
                modal.style.display = "none";
            });
        });
    </script>
