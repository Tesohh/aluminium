package command

import (
	"alumix-ceo/menu"
	"alumix-ceo/slash"
	"fmt"
	"slices"
	"strings"

	"github.com/bwmarrin/discordgo"
)

var Menu = slash.Command{
	ApplicationCommand: discordgo.ApplicationCommand{
		Name:        "menu",
		Description: "mostra il menu del ristorante selezionato",
		Options: []*discordgo.ApplicationCommandOption{
			{
				Name:        "ristorante",
				Description: "ristorante da visualizzare",
				Type:        discordgo.ApplicationCommandOptionString,
				Required:    true,
				Choices: []*discordgo.ApplicationCommandOptionChoice{
					{Name: "Alumix", Value: "alumix"},
					{Name: "Noisteria", Value: "noisteria"},
				},
			},
			{
				Name:         "date",
				Description:  "la data",
				Required:     false,
				Type:         discordgo.ApplicationCommandOptionString,
				Autocomplete: true,
			},
		},
	},
	Func: func(s *discordgo.Session, i *discordgo.Interaction) error {
		rawOptions := i.ApplicationCommandData().Options

		options := make(map[string]*discordgo.ApplicationCommandInteractionDataOption, len(rawOptions))
		for _, opt := range rawOptions {
			options[opt.Name] = opt
		}

		switch i.Type {
		case discordgo.InteractionApplicationCommand:

			restaurant := options["ristorante"].StringValue()
			if restaurant != "alumix" && restaurant != "noisteria" {
				return ErrRestaurantNotExistant
			}

			date := ""
			dateOpt, ok := options["date"]
			if !ok {
				date = "today"
			} else {
				date = dateOpt.StringValue()
			}

			m, err := menu.GetMenu("it", date, restaurant)
			if err != nil {
				return err
			}

			embed := discordgo.MessageEmbed{
				Title:       fmt.Sprintf("Menu %s di %s", restaurant, date),
				Description: "",
			}

			for _, c := range m.Categories {
				prettyTitle, ok := menu.CategoryToPrettyTitle[c.Title]
				if !ok {
					prettyTitle = c.Title
				}
				embed.Description += fmt.Sprintf("\n**%s**\n", prettyTitle)
				if len(c.Items) == 0 {
					embed.Description += "No items found\n"
					continue
				}

				for _, item := range c.Items {
					embed.Description += fmt.Sprint(item) + "\n"
				}
			}

			return slash.ReplyWithEmbed(s, i, embed)
		case discordgo.InteractionApplicationCommandAutocomplete:
			choices := make([]*discordgo.ApplicationCommandOptionChoice, len(menu.DateChoices))

			copy(choices, menu.DateChoices)

			if options["date"].StringValue() != "" {
				choices = slices.DeleteFunc(choices, func(c *discordgo.ApplicationCommandOptionChoice) bool {
					return !strings.Contains(c.Name, options["date"].StringValue())
				})
			}
			if len(choices) > 25 {
				choices = choices[:24]
			}

			return s.InteractionRespond(i, &discordgo.InteractionResponse{
				Type: discordgo.InteractionApplicationCommandAutocompleteResult,
				Data: &discordgo.InteractionResponseData{
					Choices: choices,
				},
			})
		}
		return fmt.Errorf("unreachable")
	},
}
