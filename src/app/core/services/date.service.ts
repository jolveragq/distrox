import {
	format,
	parse,
	isBefore,
	isAfter,
	addSeconds,
	addMinutes,
	addHours,
	addDays,
	addMonths,
	addYears,
	subSeconds,
	subMinutes,
	subHours,
	subDays,
	subMonths,
	subYears,
	differenceInSeconds,
	differenceInMinutes,
	differenceInHours,
	differenceInDays,
	differenceInMonths,
	differenceInYears,
	isValid,
	parseISO,
	isSameDay,
	isToday,
	isTomorrow,
	isYesterday,
} from "date-fns";

// biome-ignore lint/complexity/noStaticOnlyClass:
export class DateService {
	/** Formatea una fecha según el formato especificado */
	static format(date: Date | string, dateFormat: string): string {
		const d = typeof date === "string" ? parseISO(date) : date;
		return format(d, dateFormat);
	}

	/** Parsea un string según el formato esperado a objeto Date */
	static parse(dateString: string, dateFormat: string): Date {
		return parse(dateString, dateFormat, new Date());
	}

	/** Verifica si una fecha es anterior a otra */
	static isBefore(date1: Date, date2: Date): boolean {
		return isBefore(date1, date2);
	}

	/** Verifica si una fecha es posterior a otra */
	static isAfter(date1: Date, date2: Date): boolean {
		return isAfter(date1, date2);
	}

	/** Suma años, meses, días, horas, minutos o segundos a una fecha */
	static add(
		date: Date,
		duration: Partial<
			Record<
				"seconds" | "minutes" | "hours" | "days" | "months" | "years",
				number
			>
		>,
	): Date {
		let result = date;
		if (duration.years) result = addYears(result, duration.years);
		if (duration.months) result = addMonths(result, duration.months);
		if (duration.days) result = addDays(result, duration.days);
		if (duration.hours) result = addHours(result, duration.hours);
		if (duration.minutes) result = addMinutes(result, duration.minutes);
		if (duration.seconds) result = addSeconds(result, duration.seconds);
		return result;
	}

	/** Resta años, meses, días, horas, minutos o segundos a una fecha */
	static subtract(
		date: Date,
		duration: Partial<
			Record<
				"seconds" | "minutes" | "hours" | "days" | "months" | "years",
				number
			>
		>,
	): Date {
		let result = date;
		if (duration.years) result = subYears(result, duration.years);
		if (duration.months) result = subMonths(result, duration.months);
		if (duration.days) result = subDays(result, duration.days);
		if (duration.hours) result = subHours(result, duration.hours);
		if (duration.minutes) result = subMinutes(result, duration.minutes);
		if (duration.seconds) result = subSeconds(result, duration.seconds);
		return result;
	}

	/** Diferencia total en días entre dos fechas */
	static differenceInDays(date1: Date, date2: Date): number {
		return differenceInDays(date1, date2);
	}

	/** Devuelve la diferencia detallada entre dos fechas */
	static detailedDifference(
		date1: Date,
		date2: Date,
	): {
		years: number;
		months: number;
		days: number;
		hours: number;
		minutes: number;
		seconds: number;
	} {
		let start = date1 < date2 ? date1 : date2;
		const end = date1 >= date2 ? date1 : date2;

		const years = differenceInYears(end, start);
		start = addYears(start, years);

		const months = differenceInMonths(end, start);
		start = addMonths(start, months);

		const days = differenceInDays(end, start);
		start = addDays(start, days);

		const hours = differenceInHours(end, start);
		start = addHours(start, hours);

		const minutes = differenceInMinutes(end, start);
		start = addMinutes(start, minutes);

		const seconds = differenceInSeconds(end, start);

		return { years, months, days, hours, minutes, seconds };
	}

	/** Verifica si una fecha es válida */
	static isValid(date: Date): boolean {
		return isValid(date);
	}

	/** Verifica si dos fechas son del mismo día */
	static isSameDay(date1: Date, date2: Date): boolean {
		return isSameDay(date1, date2);
	}

	/** Verifica si una fecha es hoy */
	static isToday(date: Date): boolean {
		return isToday(date);
	}

	/** Verifica si una fecha es mañana */
	static isTomorrow(date: Date): boolean {
		return isTomorrow(date);
	}

	/** Verifica si una fecha es ayer */
	static isYesterday(date: Date): boolean {
		return isYesterday(date);
	}

	/** Retorna una descripción legible de la diferencia */
	static differenceAsText(date1: Date, date2: Date): string {
		const { years, months, days, hours, minutes, seconds } =
			DateService.detailedDifference(date1, date2);
		const parts: string[] = [];
		if (years) parts.push(`${years} año${years > 1 ? "s" : ""}`);
		if (months) parts.push(`${months} mes${months > 1 ? "es" : ""}`);
		if (days) parts.push(`${days} día${days > 1 ? "s" : ""}`);
		if (hours) parts.push(`${hours} hora${hours > 1 ? "s" : ""}`);
		if (minutes) parts.push(`${minutes} minuto${minutes > 1 ? "s" : ""}`);
		if (seconds) parts.push(`${seconds} segundo${seconds > 1 ? "s" : ""}`);
		return parts.length > 0 ? parts.join(", ") : "0 segundos";
	}
}
