const axfetch = {
    url: null,
    baseUrl: null,
    apiUrl: null,
    options: {
        type: "GET",
        dataType: "JSON",
        contentType: 'application/json; charset=utf-8',
    },
    /**
     * @param {object} options 
     * 
     * @returns {object}
     */
    ajax(options) {
        options = options || this.getOptions();

        const defaults = {
            url: this.getUrl(),
        };

        options = Object.assign(defaults, options);

        options = this.handleOptions(options);

        return $.ajax(options);
    },
    handleOptions(options) {
        if (options.contentType == 'application/json; charset=utf-8') {
            options.data = JSON.stringify(options.data);
        }

        return options;
    },
    /**
     * @param {object} queries 
     * @param {object} options 
     * 
     * @returns {object}
     */
    get(queries, options) {
        options = options || {};

        queries = queries || {};

        return this.setMethod("GET").setData(queries).withOptions(options).ajax();
    },
    /**
     * @param {object} queries 
     * @param {object} options 
     * 
     * @returns {object}
     */
    index(queries, options) {
        options = options || {};

        queries = queries || {};

        return this.urlBuilder().get(queries, options);
    },
    /**
     * @param {string} uuid
     * @param {object} queries 
     * @param {object} options 
     * 
     * @returns {object}
     */
    show(uuid, queries, options) {
        options = options || {};

        queries = queries || {};

        return this.setUuid(uuid).get(queries, options);
    },
    /**
     * @param {object} data 
     * @param {object} options 
     * 
     * @returns {object}
     */
    create(data, options) {
        options = options || {};

        data = data || {};

        return this.setMethod("POST").urlBuilder().setData(data).withOptions(options).ajax();
    },
    /**
     * @param {string} uuid
     * @param {object} data 
     * @param {object} options 
     * 
     * @returns {object}
     */
    update(uuid, data, options) {
        options = options || {};

        data = data || {};

        return this.setMethod("PUT").setUuid(uuid).setData(data).withOptions(options).ajax();
    },
    /**
     * @param {string} uuid
     * @param {object} data 
     * @param {object} options 
     * 
     * @returns {object}
     */
    patch(uuid, data, options) {
        options = options || {};

        data = data || {};

        return this.setMethod("PATCH").setUuid(uuid).setData(data).withOptions(options).ajax();
    },
    /**
     * @param {string} uuid
     * @param {object} queries 
     * @param {object} options 
     * 
     * @returns {object}
     */
    delete(uuid, queries, options) {
        options = options || {};

        queries = queries || {};

        return this.setMethod("DELETE").setUuid(uuid).setData(queries).withOptions(options).ajax();
    },
    /**
     * @param {string} path 
     * 
     * @returns {static}
     */
    setBaseUrl(baseUrl) {
        this.baseUrl = baseUrl;

        return this;
    },
    /**
     * @returns {string}
     */
    getBaseUrl() {
        return this.baseUrl;
    },
    /**
     * @param {string} path 
     * 
     * @returns {static}
     */
    setApiUrl(path) {
        this.apiUrl = this.getBaseUrl() + path;

        return this;
    },
    /**
     * @returns {string}
     */
    getApiUrl()
    {
        return this.apiUrl;
    },
    /**
     * @param {string} url 
     * 
     * @returns {static}
     */
    urlBuilder(url) {
        url = url || "";

        return this.setUrl(this.getApiUrl() + url);
    },
    /**
     * @param {string} uuid 
     * 
     * @returns {static}
     */
    setUuid(uuid) {
        return this.urlBuilder(`/${uuid}`);
    },
    /**
     * @param {string} url 
     * 
     * @returns {static}
     */
    appendPath(url) {
        return this.setUrl(this.getUrl() + url);
    },
    /**
     * @param {string} url 
     * 
     * @returns {static}
     */
    setUrl(url) {
        this.url = url;

        return this;
    },
    /**
     * @returns {string}
     */
    getUrl() {
        return this.url;
    },
    /**=
     * @param {object} options
     * 
     * @returns {static}
     */
    withOptions(options) {
        this.options = Object.assign(this.getOptions(), options);

        return this;
    },
    /**
     * @returns {object}
     */
    getOptions() {
        return this.options;
    },
    /**
     * @param {string} key 
     * @param {mixed} value
     * 
     * @returns {static}
     */
    setOptions(key, value) {
        return this.withOptions({
            [key]: value
        });
    },
    /**
     * @param {string} method
     * 
     * @returns {static}
     */
    setMethod(method) {
        return this.setOptions("type", method);
    },
    /**
     * @param {object} data
     * 
     * @returns {static}
     */
    setData(data) {
        if ($.isEmptyObject(data)) return this;

        return this.setOptions("data", data);
    },
    /**
     * 
     * @param {string} toastType
     * 
     * @returns {static}
     */
    setToast(toastType) {
        return this.setOptions("toastType", toastType);
    },
    /**
     * @returns {static}
     */
    asJson() {
        return this.setOptions("contentType", 'application/json; charset=utf-8');
    },
    /**
     * @returns {static}
     */
    asForm() {
        return this.setOptions("contentType", 'application/x-www-form-urlencoded; charset=utf-8');
    },
    /**
     * @returns {static}
     */
    asMultipart() {
        return this.setOptions("contentType", false).setOptions("processData", false);
    },
    /**
     * @param {object} headers 
     * 
     * @returns {static}
     */
    withHeaders(headers) {
        return this.setOptions("headers", headers);
    },
    /**
     * @param {string} key 
     * @param {mixed} value
     * 
     * @returns {static}
     */
    setHeader(key, value) {
        return this.withHeaders({
            [key]: value
        });
    },
    /**
     * @param {string} token 
     * 
     * @returns {static}
     */
    setBearerToken(token) {
        return this.setHeader("Authorization", `Bearer ${token}`);
    }
};