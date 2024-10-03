package menu

type Category struct {
	Title string `json:"key"`
	Items []Item `json:"value"`
}

var CategoryToPrettyTitle = map[string]string{
	"Primi piatti":            "🍝 Primi piatti",
	"Secondi piatti":          "🥩 Secondi piatti",
	"Insalate":                "🥗 Insalate",
	"Dolci":                   "🍰 Dolci",
	"Pizze dal forno a legna": "🍕 Pizze dal forno a legna",
}
