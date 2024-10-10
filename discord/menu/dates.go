package menu

import "github.com/bwmarrin/discordgo"

var DateChoices = []*discordgo.ApplicationCommandOptionChoice{
	{Name: "today", Value: "today"},
	{Name: "yesterday", Value: "yesterday"},
	{Name: "tomorrow", Value: "tomorrow"},

	{Name: "oggi", Value: "today"},
	{Name: "ieri", Value: "yesterday"},
	{Name: "domani", Value: "tomorrow"},
	{Name: "heute", Value: "today"},
	{Name: "gestern", Value: "yesterday"},
	{Name: "morgen", Value: "tomorrow"},

	{Name: "monday", Value: "monday"},
	{Name: "tuesday", Value: "tuesday"},
	{Name: "wednesday", Value: "wednesday"},
	{Name: "thursday", Value: "thursday"},
	{Name: "friday", Value: "friday"},
	{Name: "saturday", Value: "saturday"},
	{Name: "sunday", Value: "sunday"},

	{Name: "lunedi", Value: "monday"},
	{Name: "martedi", Value: "tuesday"},
	{Name: "mercoledi", Value: "wednesday"},
	{Name: "giovedi", Value: "thursday"},
	{Name: "venerdi", Value: "friday"},
	{Name: "sabato", Value: "saturday"},
	{Name: "domenica", Value: "sunday"},

	{Name: "montag", Value: "monday"},
	{Name: "dienstag", Value: "tuesday"},
	{Name: "mittwoch", Value: "wednesday"},
	{Name: "donnerstag", Value: "thursday"},
	{Name: "freitag", Value: "friday"},
	{Name: "samstag", Value: "saturday"},
	{Name: "sonntag", Value: "sunday"},
}
