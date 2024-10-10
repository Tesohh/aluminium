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
	parts := strings.Split(i.Name, "con")
	if len(parts) == 2 {
		i.Name = parts[0]
		i.Ingredients += "con "
		i.Ingredients += strings.Join(parts[1:], " con ")
	}

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
