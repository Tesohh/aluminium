package menu

import (
	"fmt"
	"strings"
)

type Item struct {
	Name        string  `json:"name"`
	Price       float32 `json:"price"`
	Description string  `json:"description"`
	Ingredients string  `json:"ingredients"`
}

func (i Item) String() string {
	s := fmt.Sprintf("`%s` (€ %.2f)", i.Name, i.Price)
	if i.Description != "" {
		s += "\n╰ " + i.Description
	}
	if i.Ingredients != "" {
		s += "\n╰ " + i.Ingredients
	}
	s = strings.ReplaceAll(s, "*", "")
	return s
}
