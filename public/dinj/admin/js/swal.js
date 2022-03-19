const modeuleSwal = {
    deleteAlert: function () {
        let options = this.options(...arguments);

        const defaults = {
            title: '你確定要刪除嗎？',
            text: "執行後將無法復原",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '確定'
        };

        options = this.assignObject(defaults, options);

        return this.warning(options);
    },
    deleteSuccess: function () {
        let options = this.options(...arguments);

        const defaults = {
            title: '刪除成功',
            text: '資料已成功刪除',
        };

        options = this.assignObject(defaults, options);

        return this.success(options);
    },
    updateSuccess: function () {
        let options = this.options(...arguments);

        const defaults = {
            title: '更新成功',
            text: '資料已成功更新',
        };

        options = this.assignObject(defaults, options);

        return this.success(options);
    },
    createSuccess: function () {
        let options = this.options(...arguments);

        const defaults = {
            title: '新增成功',
            text: '資料已成功新增',
        };

        options = this.assignObject(defaults, options);

        return this.success(options);
    },
    success: function () {
        let options = this.options(...arguments);

        const defaults = {
            title: "成功"
        };

        options = this.assignObject(defaults, options);

        options = this.assignObject(options, {
            icon: 'success'
        });

        return this.fire(options);
    },
    error: function () {
        let options = this.options(...arguments);

        const defaults = {
            title: '錯誤'
        };

        options = this.assignObject(defaults, options);

        options = this.assignObject(options, {
            icon: 'error'
        });

        return this.fire(options);
    },
    warning: function () {
        let options = this.options(...arguments);

        const defaults = {
            title: '警告'
        };

        options = this.assignObject(defaults, options);

        options = this.assignObject(options, {
            icon: 'warning'
        });

        return this.fire(options);
    },
    options: function () {
        if (typeof arguments[0] !== "object" && typeof arguments[0] !== "undefined") {
            return {
                title: arguments[0],
                text: arguments[1] || "",
            }
        }

        return arguments[0] || {};
    },
    assignObject: function (defaults, options) {
        return Object.assign(defaults, options);
    },
    jqueryExtend: function (defaults, options) {
        return $.extend(defaults, options);
    }
};

// Swal = $.extend(Swal, modeuleSwal);
Swal = Object.assign(Swal, modeuleSwal);