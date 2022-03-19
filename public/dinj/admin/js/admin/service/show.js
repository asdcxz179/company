var company = [
    // {
    //     name: "全部",
    //     value: "",
    // },
    {
        name: "冠軍夢想台",
        value: 1,
    },
    {
        name: "鼎聚網路",
        value: 2,
    },
];

var commodity = [
    {
        name: "蘋果",
        value: 1,
    },
    {
        name: "香蕉",
        value: 2,
    },
];

company.map(item => {
    $("select[name=company]").append(`<option value="${item.value}">${item.name}</option>`)
})

commodity.map(item => {
    $(`select[name="commodity[]"]`).append(`<option value="${item.value}">${item.name}</option>`)
})