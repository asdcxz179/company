// Warn if overriding existing method
if (Array.prototype.equals)
    console.warn("Overriding existing Array.prototype.equals. Possible causes: New API defines the method, there's a framework conflict or you've got double inclusions in your code.");
// attach the .equals method to Array's prototype to call it on any array
Array.prototype.equals = function (array) {
    // if the other array is a falsy value, return
    if (!array)
        return false;

    // compare lengths - can save a lot of time
    if (this.length != array.length)
        return false;

    for (let i = 0, l = this.length; i < l; i++) {
        // Check if we have nested arrays
        if (this[i] instanceof Array && array[i] instanceof Array) {
            // recurse into the nested arrays
            if (!this[i].equals(array[i]))
                return false;
        } else if (this[i] != array[i]) {
            // Warning - two different object instances will never be equal: {x:20} != {x:20}
            return false;
        }
    }
    return true;
}
// Hide method from for-in loops
Object.defineProperty(Array.prototype, "equals", { enumerable: false });

(function ($) {
    let _selfTable,
        _selfFlatpickrs,
        condition = [];

    // check obj or array exist key
    function checkHasKey(keyName, item) {
        if (typeof item === 'undefined') return -1;
        return $.inArray(keyName, $.map(item, function (value, index) {
            return index;
        }));
    }

    function drawDataTable(index) {
        if (!_selfTable) {
            console.log(`didn't use dataTableSettings`);
            return false;
        }
        _selfTable.tableApi.column(index).draw();
    }

    function singleTimeStr(params) {
        const aData = params.aData,
            columnHandleTime = params.columnHandleTime,
            _timeZone = params._timeZone,
            dataTableIndex = params.dataTableIndex,
            stime = params.stime,
            etime = params.etime;

        if (typeof aData._date == 'undefined') {
            const date = columnHandleTime(aData[dataTableIndex]),
                timeZone = _timeZone * 3600 * 1000;

            aData.date = new Date(date).getTime() - timeZone;
        }

        if (stime && !isNaN(stime)) {
            if (aData.date < stime) {
                return false;
            }
        }

        if (etime && !isNaN(etime)) {
            if (aData.date > etime) {
                return false;
            }
        }

        return true;
    }

    function rangeTimeStr(params) {
        const aData = params.aData,
            columnHandleTime = params.columnHandleTime,
            _timeZone = params._timeZone,
            dataTableIndex = params.dataTableIndex,
            stime = params.stime,
            etime = params.etime;

        if (typeof aData._date == 'undefined') {
            const date = columnHandleTime(aData[dataTableIndex]),
                dateStart = date[0],
                dateEnd = date[1];

            timeZone = _timeZone * 3600 * 1000;
            aData.dateStart = new Date(dateStart).getTime() - timeZone;
            aData.dateEnd = new Date(dateEnd).getTime() - timeZone;
        }

        if (stime && !isNaN(stime)) {
            if (aData.dateStart < stime) {
                return false;
            }
        }

        if (etime && !isNaN(etime)) {
            if (aData.dateEnd > etime) {
                return false;
            }
        }

        return true;
    }

    const errorMsg = (msg, element, settings) => {
        settings = settings || '';
        console.log('ErrorLog : ' + msg, element, settings);
        return false;
    }

    const conditionErrorMsg = (conditionStep, element, settings) => {
        if (conditionStep == '') {
            return errorMsg(`please give params conditionStep value`, element, settings);
        }

        if (typeof conditionStep != "string") {
            return errorMsg(`please give params conditionStep value with type string`, element, settings);
        }
        return true;
    }

    function keywordWithDataTable(params) {
        const aData = params.aData,
            dataTableIndex = params.dataTableIndex,
            keyword = params.keyword,
            likeMode = params.likeMode;

        let keywords;
        const tableString = $.trim(aData[dataTableIndex]);

        if (/,/.test(keyword) && likeMode) {
            keywordAry = keyword.split(',');
            keywordAry.sort();
            tableStringAry = tableString.split(/\s+|\r\n|\n/g);
            tableStringAry.sort();
            return tableStringAry.equals(keywordAry);
        } else {
            keywords = keyword;
        }

        // 模糊搜尋
        if (likeMode) {
            const reg = RegExp(keywords, 'g');
            return reg.test(tableString);
        }

        if (keywords != '' && tableString != keywords) {
            return false;
        }

        return true;
    }

    $.fn.extend({
        /**
         *  params options object
         *      options.options datatable options settings
         *      options.dataTableDrewBack datatable fnDrawCallback function
         *      options.pageStyle change pagination css style
         *
         *  return this
         *      this.table dataTable obj
         *      this.tableApi dataTable Api
         */
        dataTables: function () {
            const _self = this,
                that = $(this),
                options = arguments[0],
                defaults = {
                    options: {
                        lengthMenu: [10, 25, 50, 100],
                        info: false,
                        searching: false,
                        ordering: false,
                        language: {
                            processing: "處理中...",
                            loadingRecords: "載入中...",
                            lengthMenu: "顯示 _MENU_ 項結果",
                            zeroRecords: "沒有符合的結果",
                            info: "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                            infoEmpty: "顯示第 0 至 0 項結果，共 0 項",
                            infoFiltered: "(從 _MAX_ 項結果中過濾)",
                            infoPostFix: "",
                            search: "搜尋:",
                            paginate: {
                                "first": "第一頁",
                                "previous": "上一頁",
                                "next": "下一頁",
                                "last": "最後一頁"
                            },
                            aria: {
                                "sortAscending": ": 升冪排列",
                                "sortDescending": ": 降冪排列"
                            }
                        },
                        drawCallback: function () { },
                        columns: [],
                    },
                    tableStyle: function () { }
                };

            const settings = $.extend({}, defaults, options),
                dataTableOption = (checkHasKey('options', options) == -1) ? settings.options : $.extend({}, defaults.options, options.options),
                opts = dataTableOption || defaults.options,
                tableStyle = settings.tableStyle || function () { },
                table = that.DataTable(opts);

            tableStyle();
            _self.table = table;
            // _self.tableApi = table.api();
            _selfTable = _self;
            return _self;
        },
        /**
         *  params options object
         *      options.options flatpickr options settings
         *      options.firstDayOfWeek flatpickr firstDayOfWeek param
         *
         *  return this
         *      this.flatpickr flatpickr obj
         */
        flatpickrs: function () {
            const _self = this,
                that = $(this),
                options = arguments[0],
                defaults = {
                    options: {
                        mode: "range",
                        dateFormat: "Y-m-d H:i:S",
                        locale: "zh_tw",
                        static: true,
                        allowInput: true,
                        // minDate: "today",
                        onClose: function (selectedDates, value) {
                            let dateArr = selectedDates.map(function (date) { return new Date(date).getTime(); });
                            _self.choseDate = {
                                startTime: dateArr[0],
                                endTime: dateArr[1]
                            };
                            _self.choseValue = value.split(' 至 ');
                        }
                    },
                    // firstDayOfWeek: 1
                };

            const settings = $.extend({}, defaults, options),
                opts = (checkHasKey('options', options) == -1) ? settings.options : $.extend({}, defaults.options, options.options);
            // firstDayOfWeek = settings.firstDayOfWeek;

            // flatpickr.l10ns.default.firstDayOfWeek = firstDayOfWeek;
            _self.flatpickr = that.flatpickr(opts);
            _self.choseDate = {
                startTime: '',
                endTime: ''
            };
            _selfFlatpickrs = _self;
            return _self;
        },
        /**
         *  dataTable 欄位值為時間字串 2019-05-06 08:42:25
         *  params options
         *      (int)       options.dataTableIndex      dataTable row index
         *      (int)       options.timeZone            UTF default +8
         *      (string)    options.conditionStep       條件複寫用
         *      (int)       options.dataTableIndex      dataTable 第幾個欄位
         *      (function)  options.columnHandleTime    timeString Handle
         *
         */
        filterSingleTimeColumn: function () {
            const options = arguments[0],
                _self = this,
                defaults = {
                    conditionStep: '',
                    dataTableIndex: 1,
                    timeZone: 8,
                    columnHandleTime: function (dateTime) {
                        return dateTime;
                    }
                };

            let stime = _self.choseDate.startTime,
                etime = _self.choseDate.endTime;

            const settings = $.extend({}, defaults, options),
                dataTableIndex = settings.dataTableIndex || defaults.dataTableIndex,
                conditionStep = settings.conditionStep,
                _timeZone = settings.timeZone || defaults.timeZone,
                columnHandleTime = settings.columnHandleTime || defaults.columnHandleTime;

            if (!conditionErrorMsg(conditionStep, _self, settings)) {
                return false;
            }

            if ($(this).val() == '') {
                stime = '';
                etime = '';
                _self.flatpickr.clear();
            }

            if (!(conditionStep in condition)) {
                $.fn.dataTable.ext.search.push((oSettings, aData, iDataIndex) => singleTimeStr({
                    aData: aData,
                    stime: stime,
                    etime: etime,
                    dataTableIndex: dataTableIndex,
                    _timeZone: _timeZone,
                    columnHandleTime: columnHandleTime
                }));

                condition[conditionStep] = ($.fn.dataTable.ext.search.length - 1);
            } else {
                $.fn.dataTable.ext.search[condition[conditionStep]] = (oSettings, aData, iDataIndex) => singleTimeStr({
                    aData: aData,
                    stime: stime,
                    etime: etime,
                    dataTableIndex: dataTableIndex,
                    _timeZone: _timeZone,
                    columnHandleTime: columnHandleTime
                });
            }

            drawDataTable(dataTableIndex);
        },
        /**
         *  dataTable 欄位值為時間字串 2019-05-06 至 2019-05-07
         *  params options
         *      (int)       options.dataTableIndex      dataTable row index
         *      (int)       options.timeZone            UTF default +8
         *      (string)    options.conditionStep       條件複寫用
         *      (int)       options.dataTableIndex      dataTable 第幾個欄位
         *      (function)  options.columnHandleTime    timeString Handle
         *
         */
        filterRangeTimeColumn: function () {
            const options = arguments[0],
                _self = this,
                defaults = {
                    conditionStep: '',
                    dataTableIndex: 1,
                    timeZone: 8,
                    columnHandleTime: function (dateTime) {
                        return dateTime.split(' 至 ');
                    }
                };

            let stime = _self.choseDate.startTime,
                etime = _self.choseDate.endTime;

            const settings = $.extend({}, defaults, options),
                dataTableIndex = settings.dataTableIndex || defaults.dataTableIndex,
                conditionStep = settings.conditionStep,
                _timeZone = settings.timeZone || defaults.timeZone,
                columnHandleTime = settings.columnHandleTime || defaults.columnHandleTime;

            if (!conditionErrorMsg(conditionStep, _self, settings)) {
                return false;
            }

            if ($(this).val() == '') {
                stime = '';
                etime = '';
                _self.flatpickr.clear();
            }

            if (!(conditionStep in condition)) {
                $.fn.dataTable.ext.search.push((oSettings, aData, iDataIndex) => rangeTimeStr({
                    aData: aData,
                    stime: stime,
                    etime: etime,
                    dataTableIndex: dataTableIndex,
                    _timeZone: _timeZone,
                    columnHandleTime: columnHandleTime
                }));

                condition[conditionStep] = ($.fn.dataTable.ext.search.length - 1);
            } else {
                $.fn.dataTable.ext.search[condition[conditionStep]] = (oSettings, aData, iDataIndex) => rangeTimeStr({
                    aData: aData,
                    stime: stime,
                    etime: etime,
                    dataTableIndex: dataTableIndex,
                    _timeZone: _timeZone,
                    columnHandleTime: columnHandleTime
                });
            }

            drawDataTable(dataTableIndex);
        },
        /**
         *  清除 dataTable 的搜尋條件
         *  params obj $('table').dataTableSettings
         */
        tableFilterClear: function () {
            $.fn.dataTable.ext.search = [];
            condition = [];
            _selfTable.tableApi.search('').columns().search('').draw();
        },
        /**
         *  dataTable 的搜尋條件 (完全相等)
         *  params obj $('table').dataTables
         *  params options
         *      (string)    options.conditionStep       條件複寫用
         *      (int)       options.dataTableIndex      dataTable 第幾個欄位
         *      (string)    options.keyword             關鍵字
         */
        filterNoLikeKeyWord: function () {
            const options = arguments[0],
                _self = this,
                defaults = {
                    conditionStep: '',
                    dataTableIndex: 1,
                    keyword: ''
                };

            const settings = $.extend({}, defaults, options),
                conditionStep = settings.conditionStep,
                dataTableIndex = settings.dataTableIndex,
                keyword = $.trim(settings.keyword);

            if (!conditionErrorMsg(conditionStep, _self, settings)) {
                return false;
            }

            if (!(conditionStep in condition)) {
                $.fn.dataTable.ext.search.push((oSettings, aData, iDataIndex) => keywordWithDataTable({
                    aData: aData,
                    dataTableIndex: dataTableIndex,
                    keyword: keyword,
                    likeMode: false
                }));

                condition[conditionStep] = ($.fn.dataTable.ext.search.length - 1);
            } else {
                $.fn.dataTable.ext.search[condition[conditionStep]] = (oSettings, aData, iDataIndex) => keywordWithDataTable({
                    aData: aData,
                    dataTableIndex: dataTableIndex,
                    keyword: keyword,
                    likeMode: false
                });
            }

            drawDataTable(dataTableIndex);
        },
        /**
         *  dataTable 的搜尋條件 (模糊搜尋)
         *  params obj $('table').dataTables
         *  params options
         *      (string)    options.conditionStep       條件複寫用
         *      (int)       options.dataTableIndex      dataTable 第幾個欄位
         *      (string)    options.keyword             關鍵字
         */
        filterLikeKeyWord: function () {
            const options = arguments[0],
                _self = this,
                defaults = {
                    conditionStep: '',
                    dataTableIndex: 1,
                    keyword: ''
                };

            const settings = $.extend({}, defaults, options),
                conditionStep = settings.conditionStep,
                dataTableIndex = settings.dataTableIndex,
                keyword = $.trim(settings.keyword);

            if (!conditionErrorMsg(conditionStep, _self, settings)) {
                return false;
            }

            if (!(conditionStep in condition)) {
                $.fn.dataTable.ext.search.push((oSettings, aData, iDataIndex) => keywordWithDataTable({
                    aData: aData,
                    dataTableIndex: dataTableIndex,
                    keyword: keyword,
                    likeMode: true
                }));

                condition[conditionStep] = ($.fn.dataTable.ext.search.length - 1);
            } else {
                $.fn.dataTable.ext.search[condition[conditionStep]] = (oSettings, aData, iDataIndex) => keywordWithDataTable({
                    aData: aData,
                    dataTableIndex: dataTableIndex,
                    keyword: keyword,
                    likeMode: true
                });
            }

            drawDataTable(dataTableIndex);
        },
        /**
         *  clear flatpickr
         */
        flatpickrClear: function () {
            const _self = this;

            _self.flatpickr.clear();
        },
        /**
         * @param {callable} ajaxCallback 
         */
        submits: function (ajaxCallback) {
            const that = $(this),
                _self = this;

            that.submit(function () {
                if (typeof (that.parsley) != "undefined" && !that.parsley().validate()) {
                    return false;
                }

                const button = that.find('button[type=submit]');

                button.attr('disabled', true);

                ajaxCallback(that, _self).always(() => button.attr('disabled', false));

                return false;
            });
        }
    });
})(jQuery);
