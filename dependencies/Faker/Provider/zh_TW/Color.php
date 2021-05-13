<?php

namespace Beer_List\Dependencies\Faker\Provider\zh_TW;

class Color extends \Beer_List\Dependencies\Faker\Provider\Color
{
    /**
     * @see http://zh.wikipedia.org/zh-tw/%E9%A2%9C%E8%89%B2%E5%88%97%E8%A1%A8
     */
    protected static $safeColorNames = [
        '黑色', '粟色', '綠色', '藏青', '橄欖色',
        '紫', '鳧綠', '鮮綠色', '藍色', '銀色',
        '灰色', '黃色', '品紅', '水色', '白色',
    ];

    protected static $allColorNames = [
        '黑色', '昏灰', '灰色', '暗灰', '銀色', '亮灰色',
        '庚斯博羅灰', '白煙色', '白色', '雪色', '鐵灰色',
        '沙棕', '玫瑰褐', '亮珊瑚色', '印度紅', '褐色',
        '耐火磚紅', '栗色', '暗紅', '鮮紅', '紅色', '柿子橙',
        '霧玫瑰色', '鮭紅', '腥紅', '蕃茄紅', '暗鮭紅',
        '珊瑚紅', '橙紅', '亮鮭紅', '朱紅', '赭黃', '熱帶橙',
        '駝色', '杏黃', '椰褐', '海貝色', '鞍褐', '巧克力色',
        '燃橙', '陽橙', '粉撲桃色', '沙褐', '古銅色', '亞麻色',
        '蜜橙', '秘魯色', '烏賊墨色', '赭色', '陶坯黃', '橘色',
        '暗橙', '古董白', '日曬色', '硬木色', '杏仁白',
        '那瓦霍白', '萬壽菊黃', '蕃木瓜色', '灰土色',
        '卡其色', '鹿皮鞋色', '舊蕾絲色', '小麥色', '桃色',
        '橙色', '花卉白', '金菊色', '暗金菊色', '咖啡色',
        '茉莉黃', '琥珀色', '玉米絲色', '鉻黃', '金色',
        '檸檬綢色', '亮卡其色', '灰金菊色', '暗卡其色',
        '含羞草黃', '奶油色', '象牙色', '米黃色', '亮黃',
        '亮金菊黃', '香檳黃', '芥末黃', '月黃', '橄欖色',
        '鮮黃', '黃色', '苔蘚綠', '亮檸檬綠', '橄欖軍服綠',
        '黃綠', '暗橄欖綠', '蘋果綠', '綠黃', '草綠', '草坪綠',
        '查特酒綠', '葉綠', '嫩綠', '明綠', '鈷綠', '蜜瓜綠',
        '暗海綠', '亮綠', '灰綠', '常春藤綠', '森林綠',
        '檸檬綠', '暗綠', '綠色', '鮮綠色', '孔雀石綠',
        '薄荷綠', '青瓷綠', '碧綠', '綠松石綠', '鉻綠', '蒼色',
        '海綠', '中海綠', '薄荷奶油色', '春綠', '孔雀綠',
        '中春綠色', '中碧藍色', '碧藍色', '青藍', '水藍',
        '綠松石藍', '綠松石色', '亮海綠', '中綠松石色',
        '亮青', '淺藍', '灰綠松石色', '暗岩灰', '鳧綠', '暗青',
        '青色', '水色', '暗綠松石色', '軍服藍', '孔雀藍',
        '嬰兒粉藍', '濃藍', '亮藍', '灰藍', '薩克斯藍',
        '深天藍', '天藍', '亮天藍', '水手藍', '普魯士藍',
        '鋼青色', '愛麗絲藍', '岩灰', '亮岩灰', '道奇藍',
        '礦藍', '湛藍', '韋奇伍德瓷藍', '亮鋼藍', '鈷藍',
        '灰丁寧藍', '矢車菊藍', '鼠尾草藍', '暗嬰兒粉藍',
        '藍寶石色', '國際奇連藍', '蔚藍', '品藍', '暗礦藍',
        '極濃海藍', '天青石藍', '幽靈白', '薰衣草紫',
        '長春花色', '午夜藍', '藏青', '暗藍', '中藍', '藍色',
        '紫藤色', '暗岩藍', '岩藍', '中岩藍', '木槿紫',
        '紫丁香色', '中紫紅', '紫水晶色', '淺灰紫紅',
        '纈草紫', '礦紫', '藍紫', '紫羅蘭色', '靛色', '暗蘭紫',
        '暗紫', '三色堇紫', '錦葵紫', '優品紫紅', '中蘭紫',
        '淡紫丁香色', '薊紫', '鐵線蓮紫', '梅紅色', '亮紫',
        '紫色', '暗洋紅', '洋紅', '品紅', '蘭紫', '淺珍珠紅',
        '陳玫紅', '淺玫瑰紅', '中青紫紅', '洋玫瑰紅',
        '玫瑰紅', '紅寶石色', '山茶紅', '深粉紅', '火鶴紅',
        '淺珊瑚紅', '暖粉紅', '勃艮第酒紅', '尖晶石紅',
        '胭脂紅', '淺粉紅', '樞機紅', '薰衣草紫紅', '灰紫紅',
        '櫻桃紅', '淺鮭紅', '緋紅', '粉紅', '亮粉紅', '殼黃紅',
        '茜紅',
    ];
}
