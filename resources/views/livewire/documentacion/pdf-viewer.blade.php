<div class="mt-2">
    <h1 class="text-center text-2xl font-bold mb-2">Documento Digital</h1>
    <div class="flex justify-center ">
        @if ($pdfUrl)
            <div class="relative rounded-lg p-5 bg-gray-300 h-screen w-10/12">
                <iframe id="miIframe" src="{{ $pdfUrl }}#toolbar=0" class="w-full h-full"
                    frameborder="0"></iframe>
                <div class="absolute top-0 right-0 mr-8 w-full h-full bg-transparent" oncontextmenu="return false">
                </div>
            </div>
        @else
            <p class="text-center text-red-500 font-bold mt-5">
                ⚠️ El archivo PDF no se encontró.
            </p>
        @endif

    </div>
</div>

@script
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const iframe = document.getElementById("miIframe");

            if (iframe) {
                iframe.contentWindow.document.addEventListener("contextmenu", function(event) {
                    event.preventDefault();
                });
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            const iframe = document.getElementById("miIframe");

            if (iframe) {
                iframe.contentWindow.document.addEventListener("keydown", function(event) {
                    if (event.key === "F12" ||
                        (event.ctrlKey && event.shiftKey && event.key === "I") ||
                        (event.ctrlKey && event.key === "U")) {
                        event.preventDefault();
                    }
                });
            }
        });
    </script>
@endscript
