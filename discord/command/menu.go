package command

import (
	"alumix-ceo/menu"
	"alumix-ceo/slash"
	"fmt"

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
				Name:        "date",
				Description: "la data",
				Required:    false,
				Type:        discordgo.ApplicationCommandOptionString,
			},
		},
	},
	Func: func(s *discordgo.Session, i *discordgo.Interaction) error {
		rawOptions := i.ApplicationCommandData().Options

		options := make(map[string]*discordgo.ApplicationCommandInteractionDataOption, len(rawOptions))
		for _, opt := range rawOptions {
			options[opt.Name] = opt
		}

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

		m, err := menu.GetMenu("it", date)
		if err != nil {
			return err
		}

		embed := discordgo.MessageEmbed{
			Title:       fmt.Sprintf("Menu %s di %s", restaurant, date),
			Description: "",
			// Fields: make([]*discordgo.MessageEmbedField, len(m.Categories)),
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
	},
}
