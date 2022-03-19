var demoData = {
    admin: {
        users: [
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                login_count: "700",
                status: 1,
                permission: false,
                permission_type: "manager",
            },
            {
                uuid: "1",
                type: "客服人員",
                name: "Amy",
                username: "amy@gmail.com",
                login_time: "2022-01-09 14:10:08",
                login_count: "10",
                status: 0,
                permission: true,
            },
            {
                uuid: "1",
                type: "一般管理",
                name: "Jason",
                username: "jason@gmail.com",
                login_time: "2022-01-08 14:10:08",
                login_count: "20",
                status: 1,
                permission: true,
            },
        ],
        permissions: [
            {
                id: 1,
                text: "儀錶板",
                icon: "fa fa-cog",
                children: false,
            },
            {
                id: 2,
                text: "會員總管",
                icon: "fa fa-cog",
                children: [
                    {
                        id: 3,
                        text: "會員列表",
                        icon: "fa fa-cog",
                    },
                    {
                        id: 4,
                        text: "會員標籤",
                        icon: "fa fa-cog",
                    },
                ],
            },

        ],
        loginRecord: [
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                ip: "35.25.45.114",
            },
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                ip: "35.25.45.114",
            },
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                ip: "35.25.45.114",
            },
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                ip: "35.25.45.114",
            },
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                ip: "35.25.45.114",
            },
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                ip: "35.25.45.114",
            },
        ],
        operateRecord: [
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                ip: "35.25.45.114",
                content: "	[新增]客服面版- 編號1-1641953107092",
            },
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                ip: "35.25.45.114",
                content: "	[新增]客服面版- 編號1-1641953107092",
            },
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                ip: "35.25.45.114",
                content: "	[新增]客服面版- 編號1-1641953107092",
            },
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                ip: "35.25.45.114",
                content: "	[新增]客服面版- 編號1-1641953107092",
            },
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                ip: "35.25.45.114",
                content: "	[新增]客服面版- 編號1-1641953107092",
            },
            {
                uuid: "1",
                type: "最大權限",
                name: "鼎聚網路設計",
                username: "demo@gmail.com",
                login_time: "2022-01-10 14:10:08",
                ip: "35.25.45.114",
                content: "	[新增]客服面版- 編號1-1641953107092",
            },
        ],
        members: [
            {
                uuid: 1,
                name: "amy",
                username: "amy@gmail.com",
                email: "amy@gmail.com",
                birthday: "2017-04-14",
                sex: 0,
                telephone: [
                    "08-29477778",
                ],
                phone: [
                    "0987654321",
                    "0974148795"
                ],
                invoice: [
                    {
                        title: "仁安資訊",
                        number: "22519274"
                    }
                ],
                address: [],
                contact: [
                    {
                        uuid: 1,
                        time: "2022-01-13 11:24:24",
                        customer: "鼎聚網路設計",
                        type: "IB-訂購類 > IB-訂購類 > 1.售前諮詢-有推薦",
                        remark: "test",
                    }
                ],
                remark: [
                    {
                        uuid: 1,
                        time: "2022-01-13 11:24:24",
                        customer: "鼎聚網路設計",
                        remark: "請不要隨意退貨，謝謝。",
                    }
                ],
                company: 1,
                created_at: "2021-06-06 00:00:00",
                customer: "amy",
                count: 100,
                total: 1000,
                status: 1,
            },
            {
                uuid: 1,
                name: "dinjseo",
                username: "dinjseo@gmail.com",
                email: "dinjseo@gmail.com",
                birthday: "1994-08-07",
                sex: 0,
                telephone: [
                    "04-28763214",
                    "02-25687545"
                ],
                phone: [
                    "0912345678",
                    "0987945666"
                ],
                invoice: [
                    {
                        title: "鼎聚網路",
                        number: "54243692"
                    }
                ],
                address: [
                    "台中市北區",
                    "台中市南區",
                ],
                company: 1,
                created_at: "2021-06-06 00:00:00",
                customer: "amy",
                count: 100,
                total: 1000,
                status: 0,
            }
        ],
        member_records: [
            {
                uuid: 1,
                name: "amy",
                updated_at: "2021-10-28 00:00:00",
                customer: "amy",
                data: "會員姓名: henry => amy",
            }
        ],
        orders: [
            {
                uuid: 1,
                order_number: "13-04545687854",
                order_time: "2021-01-13",
                company: "鼎聚網路",
                product_number: "f-104",
                status: "完成",
                logistics: "黑貓",
                number: "123456",
                standard: "瓶",
                price: "90",
                count: "1",
                discount: "---",
                prepay: "0",
                provisional_pay: 0,
                host: "許鳳瑋",
                total: "90",
                product: [
                    {
                        uuid: "1",
                        name: "蘋果",
                    },
                ],
                remark: "測試帳號",
                customer: "Amy",
            },
            {
                uuid: 1,
                order_number: "13-04545687854",
                order_time: "2021-01-13",
                company: "鼎聚網路",
                product_number: "f-104",
                status: "完成",
                logistics: "黑貓",
                number: "123456",
                standard: "瓶",
                price: "50",
                count: "1",
                discount: "---",
                prepay: "0",
                provisional_pay: 0,
                host: "許鳳瑋",
                total: "90",
                product: [
                    {
                        uuid: "2",
                        name: "香蕉",
                    },
                ],
                remark: "測試帳號",
                customer: "Amy",
            },
        ],
        report: {
            index: [
                {
                    uuid: 1,
                    date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                    remark: "測試",
                    created_at: "2019-12-17 10:10:26",
                },
                {
                    uuid: 1,
                    date_time_range: "2019-07-01 16:41 ~ 2019-07-29 16:41",
                    remark: "工程師測試",
                    created_at: "2019-07-29 16:41:39",
                },
                {
                    uuid: 1,
                    date_time_range: "2019-06-01 00:00 ~ 2019-06-30 23:59",
                    remark: "",
                    created_at: "2019-07-29 08:50:25",
                },
            ],
            details: {
                file_path: `${apiUrl}/files/2022-01-22/報表.zip`,
                items: [
                    {
                        uuid: 1,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "data-清單設定",
                        file_path: `${apiUrl}/files/2022-01-22/data-清單設定.csv`,
                        created_at: "2019-12-17 10:10:26",
                    },
                    {
                        uuid: 2,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "data-產品組合",
                        file_path: `${apiUrl}/files/2022-01-22/data-產品組合.csv`,
                        created_at: "2019-07-29 16:41:39",
                    },
                    {
                        uuid: 3,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "總表",
                        file_path: `${apiUrl}/files/2022-01-22/總表.csv`,
                        created_at: "2019-07-29 08:50:25",
                    },
                    {
                        uuid: 4,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "前期退貨",
                        file_path: `${apiUrl}/files/2022-01-22/前期退貨.csv`,
                        created_at: "2019-12-17 10:10:26",
                    },
                    {
                        uuid: 5,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "本期退貨",
                        file_path: `${apiUrl}/files/2022-01-22/本期退貨.csv`,
                        created_at: "2019-07-29 16:41:39",
                    },
                    {
                        uuid: 6,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "換貨",
                        file_path: `${apiUrl}/files/2022-01-22/換貨.csv`,
                        created_at: "2019-07-29 08:50:25",
                    },
                    {
                        uuid: 7,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "區域",
                        file_path: `${apiUrl}/files/2022-01-22/區域.csv`,
                        created_at: "2019-12-17 10:10:26",
                    },
                    {
                        uuid: 8,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "發票清單&發票總檔",
                        file_path: `${apiUrl}/files/2022-01-22/發票清單&發票總檔.csv`,
                        created_at: "2019-07-29 16:41:39",
                    },
                    {
                        uuid: 9,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "產品銷售分析",
                        file_path: `${apiUrl}/files/2022-01-22/產品銷售分析.csv`,
                        created_at: "2019-07-29 08:50:25",
                    },
                    {
                        uuid: 10,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "每日系統分析",
                        file_path: `${apiUrl}/files/2022-01-22/每日系統分析.csv`,
                        created_at: "2019-12-17 10:10:26",
                    },
                    {
                        uuid: 11,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "主持人業績統計",
                        file_path: `${apiUrl}/files/2022-01-22/主持人業績統計.csv`,
                        created_at: "2019-07-29 16:41:39",
                    },
                    {
                        uuid: 12,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "庫存總表",
                        file_path: `${apiUrl}/files/2022-01-22/庫存總表.csv`,
                        created_at: "2019-07-29 08:50:25",
                    },
                    {
                        uuid: 13,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "廠商出庫明細",
                        file_path: `${apiUrl}/files/2022-01-22/廠商出庫明細.csv`,
                        created_at: "2019-12-17 10:10:26",
                    },
                    {
                        uuid: 14,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "總表配送單號收款合計",
                        file_path: `${apiUrl}/files/2022-01-22/總表配送單號收款合計.csv`,
                        created_at: "2019-07-29 08:50:25",
                    },
                    {
                        uuid: 15,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "統一客樂得對帳單 (金流-手續費)",
                        file_path: `${apiUrl}/files/2022-01-22/統一客樂得對帳單 (金流-手續費).csv`,
                        created_at: "2019-12-17 10:10:26",
                    },
                    {
                        uuid: 16,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "統一速達 客戶交易明細 (物流-運費)",
                        file_path: `${apiUrl}/files/2022-01-22/統一速達 客戶交易明細 (物流-運費).csv`,
                        created_at: "2019-07-29 16:41:39",
                    },
                    {
                        uuid: 17,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "業績總表",
                        file_path: `${apiUrl}/files/2022-01-22/業績總表.csv`,
                        created_at: "2019-07-29 08:50:25",
                    },
                    {
                        uuid: 18,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "日報商品業績達成率",
                        file_path: `${apiUrl}/files/2022-01-22/日報商品業績達成率.csv`,
                        created_at: "2019-12-17 10:10:26",
                    },
                    {
                        uuid: 19,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "月報商品業績達成率",
                        file_path: `${apiUrl}/files/2022-01-22/月報商品業績達成率.csv`,
                        created_at: "2019-07-29 16:41:39",
                    },
                    {
                        uuid: 20,
                        date_time_range: "2019-11-18 10:10 ~ 2019-12-17 10:10",
                        name: "當月新增會員",
                        file_path: `${apiUrl}/files/2022-01-22/當月新增會員.csv`,
                        created_at: "2019-07-29 16:41:39",
                    }
                ]
            }
        },
        messages: [
            {
                uuid: 1,
                type: 1,
                message: "這個人很想要",
                update_customer: "Amy",
                update_time: "2022-01-01 00:00:00",
                status: 1,
            },
            {
                uuid: 1,
                type: 2,
                message: "想退貨",
                update_customer: "Amy",
                update_time: "2022-01-01 00:00:00",
                status: 1,
            },
            {
                uuid: 1,
                type: 3,
                message: "想換貨",
                update_customer: "Amy",
                update_time: "2022-01-01 00:00:00",
                status: 1,
            },
            {
                uuid: 1,
                type: 4,
                message: "這個人很想要",
                update_customer: "Amy",
                update_time: "2022-01-01 00:00:00",
                status: 0,
            },
        ],
        hosts: [
            {
                uuid: 1,
                name: "amy",
                update_customer: "Amy",
                update_time: "2022-01-01 00:00:00",
                status: 1,
            },
            {
                uuid: 1,
                name: "henry",
                update_customer: "Amy",
                update_time: "2022-01-01 00:00:00",
                status: 1,
            },
        ],
        shows: [
            {
                uuid: 1,
                time: "2022-01-18 10:00:00 ~ 2022-01-18 11:00:00",
                company: 1,
                commodity: [
                    {
                        uuid: "a1",
                        name: "蘋果"
                    },
                    {
                        uuid: "b1",
                        name: "香蕉"
                    }
                ],
                host: "2",
                name: "amy",
                update_customer: "Amy",
                update_time: "2022-01-01 00:00:00",
                status: 1,
            },
        ],
        commoditys: [
            {
                uuid: 1,
                name: "香蕉",
                image: "https://pgw.udn.com.tw/gw/photo.php?u=https://uc.udn.com.tw/photo/2020/04/18/99/7754406.jpg&s=Y&x=0&y=30&sw=1280&sh=853&exp=3600",
                price: "10",
                storehouse: [
                    {
                        storehouses_id: 1,
                        count: 100,
                    },
                    {
                        storehouses_id: 2,
                        count: 50,
                    },
                ],
            },
            {
                uuid: 2,
                name: "蘋果",
                image: "https://img.ltn.com.tw/Upload/food/page/2019/11/22/191122-9862-1-NjB3U.jpg",
                price: "5",
                storehouse: [
                    {
                        storehouses_id: 1,
                        count: 50,
                    },
                    {
                        storehouses_id: 2,
                        count: 100,
                    },
                ],
            },
        ],
        storehouses: [
            {
                uuid: 1,
                name: "台北",
            },
            {
                uuid: 2,
                name: "台中",
            },
        ],
        company: [
            {
                uuid: 1,
                name: "冠軍夢想台",
                fax: "04-24561234",
                tel: "04-24561234",
                contact: "any",
                ID_number: "54243611",
                updated_at: "2022-01-15 00:00:00",
                status: 1,

            },
            {
                uuid: 1,
                name: "鼎聚網路",
                fax: "04-24561234",
                tel: "04-24561234",
                contact: "廷岳兄",
                ID_number: "54243692",
                updated_at: "2022-01-16 00:00:00",
                status: 1,

            },
        ],
        type: [
            {
                uuid: 1,
                name: "上衣",
                seq: 1,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,

            },
            {
                uuid: 2,
                name: "褲子",
                seq: 2,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,

            },
            {
                uuid: 3,
                name: "鞋子",
                seq: 3,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,

            },
            {
                uuid: 4,
                name: "配件",
                seq: 4,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,

            },
        ],
        category: [
            {
                uuid: 1,
                type: 1,
                type_name: "上衣",
                name: "短袖",
                seq: 1,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,

            },
            {
                uuid: 2,
                type: 1,
                type_name: "--",
                name: "長袖",
                seq: 2,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,

            },
            {
                uuid: 3,
                type: 1,
                type_name: "--",
                name: "襯衫",
                seq: 3,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,

            },
            {
                uuid: 4,
                type: 2,
                type_name: "褲子",
                name: "短褲",
                seq: 1,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,


            },
            {
                uuid: 5,
                type: 2,
                type_name: "--",
                name: "長褲",
                seq: 2,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,


            },

            {
                uuid: 6,
                type: 3,
                type_name: "鞋子",
                name: "休閒鞋",
                seq: 1,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,


            },
            {
                uuid: 7,
                type: 3,
                type_name: "--",
                name: "皮鞋",
                seq: 2,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,


            },

            {
                uuid: 8,
                type: 4,
                type_name: "配件",
                name: "眼鏡",
                seq: 1,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,


            },

            {
                uuid: 9,
                type: 4,
                type_name: "--",
                name: "包包",
                seq: 2,
                num: 0,
                updated_at: "2022-01-15 00:00:00",
                status: 1,


            },
        ],
        invoice: {
            settings: {
                items: [
                    {
                        uuid: 1,
                        year: 2022,
                        items: [
                            [{
                                track: 'RY',
                                begin: '92625650',
                                end: '92626649',
                                submit: 1,
                                invalid: 0,
                            }],
                            [{
                                track: '',
                                begin: '',
                                end: '',
                                submit: 0,
                                invalid: 0,
                            }],
                            [{
                                track: '',
                                begin: '',
                                end: '',
                                submit: 0,
                                invalid: 0,
                            }],
                            [{
                                track: '',
                                begin: '',
                                end: '',
                                submit: 0,
                                invalid: 0,
                            }],
                            [{
                                track: '',
                                begin: '',
                                end: '',
                                submit: 0,
                                invalid: 0,
                            }],
                            [{
                                track: '',
                                begin: '',
                                end: '',
                                submit: 0,
                                invalid: 0,
                            }],
                        ]
                    },
                    {
                        uuid: 2,
                        year: 2021,
                        items: [
                            [{
                                track: 'FN',
                                begin: '91644950',
                                end: '91645949',
                                submit: 0,
                                invalid: 1,
                            }],
                            [{
                                track: 'HH',
                                begin: '91644951',
                                end: '91645949',
                                submit: 15,
                                invalid: 7,
                            }],
                            [{
                                track: 'KC',
                                begin: '91644951',
                                end: '91645949',
                                submit: 11,
                                invalid: 1,
                            }],
                            [{
                                track: 'LX',
                                begin: '91643950',
                                end: '91644950',
                                submit: 21,
                                invalid: 3,
                            }],
                            [{
                                track: 'NS',
                                begin: '91643950',
                                end: '91644449',
                                submit: 13,
                                invalid: 1,
                            }],
                            [{
                                track: 'QM',
                                begin: '91644950',
                                end: '91645749',
                                submit: 26,
                                invalid: 0,
                            }],
                        ]
                    },
                    {
                        uuid: 3,
                        year: 2020,
                        items: [
                            [{
                                track: 'TR',
                                begin: '57809500',
                                end: '57810999',
                                submit: 1,
                                invalid: 2,
                            }],
                            [{
                                track: 'VM',
                                begin: '4533050',
                                end: '4533299',
                                submit: 1,
                                invalid: 7,
                            }],
                            [{
                                track: 'XG',
                                begin: '4450000',
                                end: '4450499',
                                submit: 0,
                                invalid: 11,
                            }],
                            [{
                                track: 'AD',
                                begin: '22106750',
                                end: '22107249',
                                submit: 11,
                                invalid: 7,
                            }],
                            [{
                                track: '',
                                begin: '',
                                end: '',
                                submit: 0,
                                invalid: 0,
                            }],
                            [{
                                track: 'CQ',
                                begin: '57809500',
                                end: '57810999',
                                submit: 4,
                                invalid: 0,
                            }],
                        ]
                    },
                    {
                        uuid: 4,
                        year: 2019,
                        items: [
                            [{
                                track: 'LM',
                                begin: '48318700',
                                end: '48319949',
                                submit: 0,
                                invalid: 0,
                            }],
                            [{
                                track: 'NJ',
                                begin: '58831000',
                                end: '58832249',
                                submit: 0,
                                invalid: 0,
                            }],
                            [{
                                track: 'QF',
                                begin: '62270650',
                                end: '62273149',
                                submit: 0,
                                invalid: 0,
                            }],
                            [
                                {
                                    track: 'SC',
                                    begin: '88467500',
                                    end: '88467509',
                                    submit: 9,
                                    invalid: 1,
                                },
                                {
                                    track: 'SC',
                                    begin: '88386100',
                                    end: '88386101',
                                    submit: 2,
                                    invalid: 0,
                                },
                                {
                                    track: 'SC',
                                    begin: '88467509',
                                    end: '88467999',
                                    submit: 25,
                                    invalid: 5,
                                }
                            ],
                            [{
                                track: 'TZ',
                                begin: '60896406',
                                end: '60896799',
                                submit: 17,
                                invalid: 11,
                            }],
                            [{
                                track: 'VW',
                                begin: '60893800',
                                end: '60894299',
                                submit: 2,
                                invalid: 1,
                            }],
                        ]
                    },
                ],
                detail: {
                    uuid: 4,
                    year: 2019,
                    items: [
                        [{
                            track: 'LM',
                            begin: '48318700',
                            end: '48319949',
                            submit: 0,
                            invalid: 0,
                        }],
                        [{
                            track: 'NJ',
                            begin: '58831000',
                            end: '58832249',
                            submit: 0,
                            invalid: 0,
                        }],
                        [{
                            track: 'QF',
                            begin: '62270650',
                            end: '62273149',
                            submit: 0,
                            invalid: 0,
                        }],
                        [
                            {
                                track: 'SC',
                                begin: '88467500',
                                end: '88467509',
                                submit: 9,
                                invalid: 1,
                            },
                            {
                                track: 'SC',
                                begin: '88386100',
                                end: '88386101',
                                submit: 2,
                                invalid: 0,
                            },
                            {
                                track: 'SC',
                                begin: '88467509',
                                end: '88467999',
                                submit: 25,
                                invalid: 5,
                            }
                        ],
                        [{
                            track: 'TZ',
                            begin: '60896406',
                            end: '60896799',
                            submit: 17,
                            invalid: 11,
                        }],
                        [{
                            track: 'VW',
                            begin: '60893800',
                            end: '60894299',
                            submit: 2,
                            invalid: 1,
                        }],
                    ]
                },
                api: {
                    url: 'http://einvoice-test.plusmore.com.tw:5488/EinvoiceServer',
                    api_id: 'PM54243692',
                    name: '鼎聚網路股份有限公司',
                    short_name: '鼎聚網路',
                    address: '臺中市西屯區何德里寧夏路89巷6號2樓',
                    add_date: '2019-01-26',
                    api_key: 'db4991022666ddccf4e245b637a61fc5',
                    qrcode_key: '54243692qrcode',
                    aes_key: '79D771AC2DD03BE7166D384F6290B1B7',
                    aes_iv: 'Dt8lyToo17X/XkXaQvihuA==',
                }
            },
        }
    }
};

//initializing
!function ($) {
    "use strict";
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Init`,
            type: "POST",
            responseText: {
                "message": "初始化設定成功",
                "status": true,
                "data": [],
            },
            status: 200
        },
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Users`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.users,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Users`,
            type: "POST",
            responseText: {
                "message": "新增成功",
                "status": true,
                "data": [],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Users/1`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.users[0],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Users/1`,
            type: "PUT",
            responseText: {
                "message": "更新成功",
                "status": true,
                "data": [],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/UserStatus/1`,
            type: "PUT",
            responseText: {
                "message": "更新成功",
                "status": true,
                "data": [],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Permission/1`,
            type: "PUT",
            responseText: {
                "message": "更新成功",
                "status": true,
                "data": [],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Permission`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.permissions,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Permission/1`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": {
                    "permission": [1, 3]
                },
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/LoginRecord`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.loginRecord,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/OperateRecord`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.operateRecord,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Member/1`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.members[0],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Member`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.members,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Member/Order/1`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.orders,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Member`,
            type: "POST",
            responseText: {
                "message": "新增成功",
                "status": true,
                "data": [],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Report`,
            type: "GET",
            responseText: {
                message: "",
                status: true,
                data: demoData.admin.report.index,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: /\/Admin\/Report\/([\d]+)$/,
            type: "GET",
            responseText: {
                message: "",
                status: true,
                data: demoData.admin.report.details,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Report`,
            type: "POST",
            responseText: {
                message: "新增成功，後台正在執行，請耐心等候",
                status: true,
                data: [],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: /\/Admin\/Report\/([\d]+)$/,
            type: "DELETE",
            responseText: {
                message: "刪除成功",
                status: true,
                data: [],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: /\/Admin\/Report\/Detail\/([\d]+)$/,
            type: "DELETE",
            responseText: {
                message: "刪除成功",
                status: true,
                data: [],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Message`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.messages,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Message`,
            type: "POST",
            responseText: {
                "message": "新增成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/MessageStatus/1`,
            type: "PUT",
            responseText: {
                "message": "更新成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Message/1`,
            type: "GET",
            responseText: {
                message: "",
                status: true,
                data: demoData.admin.messages[0],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Message/1`,
            type: "DELETE",
            responseText: {
                "message": "刪除成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Host`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.hosts,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Host`,
            type: "POST",
            responseText: {
                "message": "新增成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/HostStatus/1`,
            type: "PUT",
            responseText: {
                "message": "更新成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Host/1`,
            type: "GET",
            responseText: {
                message: "",
                status: true,
                data: demoData.admin.hosts[0],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Host/1`,
            type: "DELETE",
            responseText: {
                "message": "刪除成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Show`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.shows,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Show`,
            type: "POST",
            responseText: {
                "message": "新增成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/ShowStatus/1`,
            type: "PUT",
            responseText: {
                "message": "更新成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Show/1`,
            type: "GET",
            responseText: {
                message: "",
                status: true,
                data: demoData.admin.shows[0],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Show/1`,
            type: "DELETE",
            responseText: {
                "message": "刪除成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Member`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.members,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Member/1`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.members[0],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/MemberRecord`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.member_records,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/MemberActive`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.member_records,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Service/Commodity`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.commoditys,
            },
            status: 200
        }
    );

    //廠商管理
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Company`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.company,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Company`,
            type: "POST",
            responseText: {
                "message": "新增成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Company/1`,
            type: "PUT",
            responseText: {
                "message": "更新成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/CompanyStatus/1`,
            type: "PUT",
            responseText: {
                "message": "更新成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Company/1`,
            type: "GET",
            responseText: {
                message: "",
                status: true,
                data: demoData.admin.company[0],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Invoice/Setting`,
            type: "GET",
            responseText: {
                message: "",
                status: true,
                data: demoData.admin.invoice.settings.items,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Invoice/Setting`,
            type: "POST",
            responseText: {
                message: "新增成功",
                status: true,
                data: [],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: /\/Admin\/Invoice\/Setting\/([\d]+)$/,
            type: "GET",
            responseText: {
                message: "",
                status: true,
                data: demoData.admin.invoice.settings.detail,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: /\/Admin\/Invoice\/Setting\/([\d]+)$/,
            type: "PUT",
            responseText: {
                message: "更新成功",
                status: true,
                data: [],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Invoice/Api`,
            type: "GET",
            responseText: {
                message: "",
                status: true,
                data: demoData.admin.invoice.settings.api,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/Invoice/Api`,
            type: "POST",
            responseText: {
                message: "更新成功",
                status: true,
                data: [],
            },
            status: 200
        }
    );
    //主分類
    $.mockjax(
        {
            url: `${apiUrl}/Admin/ProductType`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.type,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/ProductType`,
            type: "POST",
            responseText: {
                "message": "新增成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/ProductType/1`,
            type: "PUT",
            responseText: {
                "message": "更新成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/TypeStatus/1`,
            type: "PUT",
            responseText: {
                "message": "更新成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/ProductType/1`,
            type: "GET",
            responseText: {
                message: "",
                status: true,
                data: demoData.admin.type[0],
            },
            status: 200
        }
    );

    //次分類
    $.mockjax(
        {
            url: `${apiUrl}/Admin/ProductCategory`,
            type: "GET",
            responseText: {
                "message": "",
                "status": true,
                "data": demoData.admin.category,
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/ProductCategory`,
            type: "POST",
            responseText: {
                "message": "新增成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/ProductCategory/1`,
            type: "PUT",
            responseText: {
                "message": "更新成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/ProductCategory/1`,
            type: "PUT",
            responseText: {
                "message": "更新成功",
                "status": true,
                "data": "",
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/Admin/ProductCategory/1`,
            type: "GET",
            responseText: {
                message: "",
                status: true,
                data: demoData.admin.category[0],
            },
            status: 200
        }
    );
    $.mockjax(
        {
            url: `${apiUrl}/DinjApi/v1/Login`,
            type: "POST",
            responseText: {
                message: "登入成功",
                status: true,
                data: [],
            },
            status: 200
        }
    );
}(window.jQuery);
