var company = [
    {
        name: "-選擇主分類-",
        value: "",
    },
    {
        name: "上衣",
        value: 1,
    },
    {
        name: "褲子",
        value: 2,
    },
    {
        name: "鞋子",
        value: 3,
    },
    {
        name: "配件",
        value: 4,
    },
];



company.map(item => {
    $("select[name=type]").append(`<option value="${item.value}">${item.name}</option>`)
})

