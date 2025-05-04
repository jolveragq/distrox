import { Injectable } from "@angular/core";
import { DateService } from "./date.service";

type TimestampFields = "created_at" | "updated_at" | "deleted_at";

type WithConvertedTimestamps<T> = Omit<T, TimestampFields> & {
	[K in keyof T as K extends TimestampFields ? K : never]?: Date;
};

// biome-ignore lint/complexity/noStaticOnlyClass: <explanation>
export class TimestampService {
	/**
	 * Convierte propiedades tipo string ISO a tipo Date para campos timestamp comunes.
	 * @param entity Objeto con posibles campos de timestamps
	 */
	public static convertTimestamps<T extends Record<string, any>>(
		entity: T,
	): WithConvertedTimestamps<T> {
		const result = { ...entity };

		// biome-ignore lint/complexity/noForEach: <explanation>
		["created_at", "updated_at", "deleted_at"].forEach((key) => {
			if (result[key] && typeof result[key] === "string") {
				// @ts-ignore
				result[key] = DateService.parse(result[key]);
			}
		});

		return result as WithConvertedTimestamps<T>;
	}
}
