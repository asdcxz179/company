# Flatpickr

1. 使用方法
    1. 區間選擇
        1. 雙 input
            ```html
            <div class="col-3">
                <input type="text" class="form-control" placeholder="請選擇一段時間" autocomplete="off" id="start">
                <input type="text" class="form-control" placeholder="請選擇一段時間" autocomplete="off" id="end">
            </div>
            <!-- 區間套件 -->
            <script src="{{ Universal::version('/assets/plugins/flatpickr/plugins/rangePlugin.js') }}"></script>
            <script>
                $("#start").flatpickr({
                    enableTime: true, // 時間時分顯示
                    dateFormat: "Y-m-d H:i:S",
                    enableSeconds: true, // 秒數顯示
                    plugins: [new rangePlugin({ input: "#end" })]
                });
            </script>
            ```
        1. 單 input
            ```html
            <div class="col-3">
                <input type="text" class="form-control" placeholder="請選擇一段時間" autocomplete="off" id="start">
            </div>
            <script>
                $("#start").flatpickr({
                    enableTime: true, // 時間時分顯示
                    dateFormat: "Y-m-d H:i:S",
                    enableSeconds: true, // 秒數顯示
                });
            </script>
            ```