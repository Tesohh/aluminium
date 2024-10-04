package menu

import (
	"bytes"
	"encoding/json"
	"fmt"
	"os"
	"os/exec"
)

func GetMenu(lang string, date string, restaurant string) (Menu, error) {
	cmd := exec.Command("python3", "alumix/main.py", "--json", "--guess", "--std", "--lang", lang, "--restaurant", restaurant, "--", date)

	stdout := bytes.NewBuffer(make([]byte, 0))
	cmd.Stdout = stdout
	cmd.Stderr = os.Stderr

	err := cmd.Start()
	if err != nil {
		return Menu{}, fmt.Errorf("cmd.Start(): %w", err)
	}

	err = cmd.Wait()
	if err != nil {
		return Menu{}, fmt.Errorf("cmd.Wait(): %w", err)
	}

	menu := Menu{}
	err = json.NewDecoder(stdout).Decode(&menu)

	// TODO: check if language exists, and if the menu is valid

	return menu, err
}
