var type = [
    // {
    //     name: "全部",
    //     value: "",
    // },
    {
        name: "訂單備註",
        value: 1,
    },
    {
        name: "退貨原因",
        value: 2,
    },
    {
        name: "換貨原因",
        value: 3,
    },
    {
        name: "聯繫備註",
        value: 4,
    },
];

type.map(item => {
    $("select[name=type]").append(`<option value="${item.value}">${item.name}</option>`)
})