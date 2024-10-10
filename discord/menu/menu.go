package menu

type Menu struct {
	Categories [][]Category `json:"menu"`
	Date       string       `json:"date"`
	Mode       string       `json:"mode"`
}
